<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;
// use Illuminate\Image\Facades\Image;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\ImageManager;
use Session;
use Storage;

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
        // $imagePath = null;



        // $image = Image::read($productFormRequest->file('image'));
        // $image->resize(100,100);
        // $image->save($destinationPathThumbnail.$imageName);



        if($productFormRequest->hasFile('image')){
            $image = $productFormRequest->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $resizedImage = Image::read($image)->resize(100,100)->encode();
            Storage::put('public/images/' . $imageName, $resizedImage);
            $imagePath = 'images/' . $imageName;
        }

        Product::create([
            'name' => $productFormRequest['name'],
            'description' => $productFormRequest['description'],
            'price' => $productFormRequest['price'],
            'category_id' => $productFormRequest['category'],
            'image' => $imagePath

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

        if($request->hasFile('image')){
            if($products->image && Storage::exists('public/' . $products->image)){
                Storage::delete('public/'. $products->image);
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $newImage = $products->image = 'images/' . $imageName;
        }

        $products->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price'],
            'category_id' => $request['category'],
            'image' => $newImage
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
        if($product->image && Storage::exists('public/' . $product->image)){
            Storage::delete(('public/' . $product->image));
        }
        $product->delete();
        
        Session::flash('danger', 'Product Deleted!');
        return redirect()->route('products.index');
    }


    public function search(Request $request)
{
    $query = $request->input('query');
    

    $products = Product::where('name', 'LIKE', "%{$query}%")
                       ->orWhere('description', 'LIKE', "%{$query}%")
                       ->orWhereHas('categories', function($q) use($query){
                        $q->where('name', 'LIKE', "%{$query}%");
                       })
                       ->get();

    return view('products.index', compact('products'));
}

public function removeStock(Request $request, Product $product){
    $request->validated([
        'rem'
    ]);
}

}
