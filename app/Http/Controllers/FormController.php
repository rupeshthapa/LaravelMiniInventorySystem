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
    public function addCategory(CategoryFormRequest $categoryFormRequest){
        $categoryFormRequest->validated();
        Category::create([
            'name' => $categoryFormRequest['name']
        ]);
        Session::flash('success', 'Category added!');
        return view('categories');
    }

    public function addProduct(ProductFormRequest $productFormRequest){
        $productFormRequest->validated();

        Product::create([
            'name' => $productFormRequest['name'],
            'description' => $productFormRequest['description'],
            'price' => $productFormRequest['price'],
            'category_id' => $productFormRequest['category']

        ]);
        Session::flash('success', 'Product added!');
        // return view('products');
        return redirect()->back();
    }


    public function editedCategory(Request $request, $id){
        $category = Category::find($id);
        $category->update($request->all());

        Session::flash('success', 'Category Edited!');
        return view('categories');
    }

    public function deletedCategory($id){
        $category = Category::find($id);
        $category->delete();

        Session::flash('danger', 'Categroy Deleted!');
        return view('categories');
    }
    
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
