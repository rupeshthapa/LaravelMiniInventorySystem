<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockFormRequest;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Session;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $product = Product::find($id);
        return view('stocks.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($product_id)
    {
        // dd($request->all());

        return view('stocks.create', compact('product_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StockFormRequest $stockFormRequest)
    {
        $stockFormRequest->validated();
        // dd($stockFormRequest->validated());
        Stock::create([
            'stock' => $stockFormRequest['stock'],
            'product_id' => $stockFormRequest['product_id']

        ]);
        Session::flash('success', 'Stock Added!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function removeStock(Request $request, $product_id)
    {
        $request->validate([
            'removeStock' => 'required|integer|min:1',
        ]);

        $stocks = Stock::where("product_id",$product_id)->get();
        $toRemove = $request->removeStock;
        $totalAvailable = $stocks->sum("stock");

        if ($toRemove > $totalAvailable) {
            return back()->with('danger', 'Removed maximum available stock. You requested more than available.');
        }

        $remaining = $toRemove;

        foreach ($stocks as $stock) {
            if ($remaining <= 0) break;
    
            if ($stock->stock > 0) {
                if ($stock->stock >= $remaining) {
                    $stock->stock -= $remaining;
                    $remaining = 0;
                } else {
                    $remaining -= $stock->stock;
                    $stock->stock = 0;
                }
    
                $stock->save();
            }
        }

        return back()->with('success', 'Stock removed successfully.');
   
    }

}