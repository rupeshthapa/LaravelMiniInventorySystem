<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\ProductFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class FormController extends Controller
{
    public function register(RegisterFormRequest $registerFormRequest){
        $registerFormRequest->validated();
        User::create([
            'name' => $registerFormRequest['name'],
            'email' => $registerFormRequest['email'],
            'password' => Hash::make($registerFormRequest['password'])
        ]);
        return redirect()->route('rLogin')->with('success', 'Registration Successful!');
    }

    public function login(LoginFormRequest $loginFormRequest){
       $data = $loginFormRequest->validated();

        // $user = User::where([
        //     'email' => $loginFormRequest['email'],
        //     'password' => $loginFormRequest['password']
        // ]);

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

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('rLogin')->with('danger', 'Logout Succesful!');
    }

    p


   
    
    public function editedProduct(Request $request, $id){
        $product = Product::find($id);
        $product->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price'],
            'category_id' => $request['category'] 
        ]);

        Session::flash('success', 'Product Edited!');
        return redirect()->route('products');
    }

    public function deletedProduct($id){
        $product = Product::find($id);
        $product->delete();
        
        Session::flash('danger', 'Product Deleted!');
        return redirect()->route('products');
    }
    
}
