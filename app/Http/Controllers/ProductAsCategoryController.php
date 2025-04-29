<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductAsCategoryController extends Controller
{
    public function productAsCategory(){
        return view('productsAsCategory.productAsCategory');
    }
}
