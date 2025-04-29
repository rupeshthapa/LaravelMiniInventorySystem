<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginFormController extends Controller
{


    public function rLogin(){
        return view('auth.login');
    }


    public function login(LoginFormRequest $loginFormRequest){
        $data = $loginFormRequest->validated();
 
         if(Auth::attempt([
             'email'=> $data['email'],
             'password' => $data['password']
         ])){
 
             
             return redirect()->route('dashboard')->with([
                 'success' => 'Login Successful!',
                 // 'categories' => $categories
             ]);
             // return redirect()->route('dashboard')->with('success', 'Login Successful!')
         }
     }
}
