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


    public function reports(){
        return view('reports');
    }

    


    public function productAsCategory(){
        return view('productsAsCategory.productAsCategory');
    }
}

