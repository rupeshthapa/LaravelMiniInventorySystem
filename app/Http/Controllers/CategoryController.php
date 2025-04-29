<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('categories.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryFormRequest $categoryFormRequest)
    {
        $categoryFormRequest->validated();
        Category::create([
            'name' => $categoryFormRequest['name']
        ]);
        Session::flash('success', 'New Category Added!');
        return view('categories.categories');

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
        $category = Category::find($id);
        return view('categories.editCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->update($request->all());

        Session::flash('warning', 'Category Edited Succesfully!');
        return view('categories.categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categroy = Category::find($id);
        $categroy->delete();

        Session::flash('danger', 'Category Deleted!');
        return view('categories.categories');

    }
}
