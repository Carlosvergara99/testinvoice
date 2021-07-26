<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::OrderBy('id', 'DESC')->paginate(10);
        return view ('product/index')->with(compact('products')); 

    }
}
