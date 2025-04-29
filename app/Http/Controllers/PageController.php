<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function rRegister(){
        return view('auth.register');
    }

    public function rLogin(){
        return view('auth.login');
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function products(){
        
    }

    public function reports(){
        return view('reports');
    }


    public function editCategory(string $id){
        $category = Category::find($id);
        return view('features.editCategory', compact('category'));
    }

    
    public function editProduct($id){
        $product = Product::find($id);
    return view('features.editProduct', compact('product'));
    // $product = Product::find($id);
    // $product->update($request->all());

    // Session::flash('success', 'Product Edited!');
    // return redirect()->route('products');
}

public function productAsCategory(){
    return view('productsAsCategory.productAsCategory');
}
}

