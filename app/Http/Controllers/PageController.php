<?php

namespace App\Http\Controllers;

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
}
