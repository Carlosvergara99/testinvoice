<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Invoices;
use App\InvoicesProducts;
use Alert;


class InvoicesProductsController extends Controller
{
    public function index()
    {
        $invoicesProducts =InvoicesProducts::OrderBy('id', 'DESC')->paginate(10);
        return view ('invoice_product/index')->with(compact('invoicesProducts')); 

    }
    public function create()
    {
      $products =Products::get(['id','name']);
      $invoices =Invoices::get(['id']);
      return view ('invoice_product/create')->with(compact('invoices','products')); 
    }
   
}
