@extends('layouts.layout')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card p-4 shadow-sm">
                    <div class="card-body">
                        <h2 class="car-title text-center">Add Products</h2>
                        @if (session('success'))
                            <p style="color: green;">{{ session('success') }}</p>
                        @endif
                        @if (session('danger'))
                            <p style="color: red;">{{ session('danger') }}</p>
                        @endif
                        <form method="POST" action="{{ route('products.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="form-label">Product Name</label>
                                <input type="text" class="form-control" placeholder="Enter the product name...." name="name">
                                @error('name')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="form-label">Product Description</label>
                                <textarea class="form-control" placeholder="Describe the product...." name="description"></textarea> 
                                @error('description')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="form-label">Product Price</label>
                                <input type="number" class="form-control" placeholder="Enter the price...." name="price">
                                @error('price')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror   
                            </div>
                            <div class="mb-3">
                                <label for="form-label">Stock</label>
                                <input type="number" class="form-control" placeholder="Enter the price...." name="stock">
                                @error('stock')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror   
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Product Category</label>
                                <select class="form-select w-100" name="category">
                                    <option value="">--Select--</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                                
                            @error('category')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                            </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary w-75">Add</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection