<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterFormController extends Controller
{
    
    public function rRegister(){
        return view('auth.register');
    }


    public function register(RegisterFormRequest $registerFormRequest){
        $registerFormRequest->validated();
        User::create([
            'name' => $registerFormRequest['name'],
            'email' => $registerFormRequest['email'],
            'password' => Hash::make($registerFormRequest['password'])
        ]);
        return redirect()->route('rLogin')->with('success', 'Registration Successful!');
    }

}
