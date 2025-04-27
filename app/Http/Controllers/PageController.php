<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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

    public function categories(){
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function products(){
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function reports(){
        return view('reports');
    }


    public function editCategory(string $id){
        $category = Category::find($id);
        return view('features.editCategory', compact('category'));
    }
}
