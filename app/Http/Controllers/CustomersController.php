<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;
use Alert;


class CustomersController extends Controller
{
    public function index()
    {
       $customers = Customers::OrderBy('id', 'DESC')->paginate(10);
       return view ('customer/index')->with(compact('customers')); 
    }

    public function create()
    {
        return view ('customer/create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'nit' => 'required|numeric|unique:customers,nit',
            'address' => 'required',
            'city' => 'required',
            'email' => 'required|unique:customers,email',
            'phone' => 'required|numeric',
        ]);

        $customers =  new Customers($request->all());
        $customers->save();
        Alert::success('', 'el cliente ha sido registrado con exito!')->persistent('Close');
        return redirect()->route('customer.index');
    }
    public function edit($id)
    {
        $customer = Customers::find($id);
        return view ('customer/update')->with(compact('customer')); 

    }
    public function update(Request $request, $id)
    {
        $customer = Customers::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:255',
            'nit' => 'required|numeric|unique:customers,nit,'.$id,
            'address' => 'required',
            'city' => 'required',
            'email' => 'required|unique:customers,email,'.$id,
            'phone' => 'required|numeric',
        ]);
        $customer = Customers::findOrFail($id);
        $customer->update($request->all());

        Alert::success('', 'el cliente ha sido Actualizado con exito!')->persistent('Close');
        return redirect()->route('customer.index');
    }
    public function destroy($id)
    {
       $customer = Customers::find($id);
       $customer->delete();
       Alert::success('', 'el cliente ha sido Eliminado con exito!')->persistent('Close');
       return redirect()->route('customer.index');

    }
}
