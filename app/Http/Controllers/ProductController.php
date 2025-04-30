<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::with('categories')->get();
        // $products = DB::table("products")->join('categories', 'categories.id', '=', 'products.category_id')
        //             ->select("products.id as id","categories.id as cat_id","categories.name as cat_name")
        //             ->get();

        // $products = Product::all();
        $products = Product::with('categories')->withSum('stock', 'stock')->get();        
        return view('products.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductFormRequest $productFormRequest)
    {   
        $productFormRequest->validated();
        Product::create([
            'name' => $productFormRequest['name'],
            'description' => $productFormRequest['description'],
            'price' => $productFormRequest['price'],
            'category_id' => $productFormRequest['category']

        ]);
        Session::flash('success', 'New Product Added!');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Product::find($id);
        $products->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price'],
            'category_id' => $request['category']
        ]);
        Session::flash('warning', 'Product Edited Successfully!');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        
        Session::flash('danger', 'Product Deleted!');
        return redirect()->route('products.index');
    }


    public function search(Request $request)
{
    $query = $request->input('query');

    $products = Product::where('name', 'LIKE', "%{$query}%")
                       ->orWhere('description', 'LIKE', "%{$query}%")
                       ->get();

    return view('products.index', compact('products'));
}

}
