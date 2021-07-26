<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoices;
use App\Products;
use App\Customers;
use App\InvoicesProducts;
use PDF;


class InvoicesController extends Controller
{
    public function index()
    {
       $invoices =Invoices::with(['customer','invoiceproduct','Invoiceproduct.product'])->OrderBy('id', 'DESC')->paginate(10);
       $clients = Customers::get(['id','name']);
       $products =Products::get(['id','name']);
       return view ('invoice/index')->with(compact('invoices','clients','products')); 

    }
    public function store(Request $request)
    {
       
        $invoice = new Invoices($request->only('date_issued','due_date','customer_id'));
        $invoice->save();
        
        foreach ($request->products as $key => $value) {

            $data =new  InvoicesProducts;
            $data->invoice_id= $invoice->id;
            $data->product_id= $value['product_id'];
            $data->amount= $value['amount'];
            $data->total_value = $value['total_value'];
            $data->save();
        }

    }

    public function update(Request $request)
    {
        $invoice = Invoices::findOrFail($request->id);
        $invoice->update($request->only('date_issued','due_date','customer_id'));
        InvoicesProducts::where('invoice_id', $request->id)->update(['status' => 0]);

         foreach ($request->products as $key => $value) {
            $validate =InvoicesProducts::where('invoice_id', $request->id)->where('product_id',$value['product_id'])->exists();
            if (!$validate) {
                $data =new  InvoicesProducts;
                $data->invoice_id= $request->id;
                $data->product_id= $value['product_id'];
                $data->amount= $value['amount'];
                $data->total_value = $value['total_value'];
                $data->save();
            }
        }
          foreach ($request->products as $key => $value) {
            $invoiceproducts = InvoicesProducts::where('invoice_id', $request->id)->where('product_id', $value['product_id'])
            ->update( 
            ['status' => 1],
            ['amount'=>  $value['amount']],
            ['total_value'=>  $value['total_value']]);
          }
    }
 
    public function priceproduct( Request $request)
    {
       $price =Products::where('id',$request->product_id)->first(['name','price']);
       $price->product_id= $request->product_id;
       $price->total_value = $price->price*$request->amount;
       $price->amount =$request->amount;
       return response()->json($price);
    }
    public function productsget( Request $request)
    {
       $products= [];
       $invoicesdata = InvoicesProducts::where('invoice_id',$request->id)->where('status',1)->get(['product_id','total_value','amount']);
  
       foreach ($invoicesdata as $key => $value) {
        $data =Products::where('id',$value->product_id)->first(['name','price']);
        array_push($products, 
        ["name" => $data->name ,
        "price" => $data->price ,
        "product_id"=>$value->product_id,
        "total_value"=>$value->total_value,
        "amount"=>$value->amount]
        );
       }
       return response()->json($products);
    }
    public function changestatus(Request $request)
    {
        $invoices = Invoices::findOrFail($request->id);
        $invoices->active =0;
        $invoices->save();
    }
    public function generatepdf($id)
    {
        $total =0;
        $invoices =Invoices::with(['customer','invoiceproduct','invoiceproduct.product'])->where('id',$id)->first();
        foreach ($invoices->invoiceproduct as $key => $value) {
            $total +=$value->pivot->total_value;
        }
        
        return PDF::loadView('invoice/pdf', compact('invoices','total'))
        ->stream('archivo.pdf');
    }
}
