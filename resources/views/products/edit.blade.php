@extends('layouts.layout')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card p-4 shadow-sm">
                <div class="card-body">
                    <h2 class="car-title text-center">Edit Products</h2>
                    @if (session('success'))
                        <p style="color: green;">{{ session('success') }}</p>
                    @endif
                    <form method="POST" action="{{ route('products.update', $product->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="form-label">Product Name</label>
                            <input type="text" class="form-control" placeholder="Enter the product name...." value="{{ $product->name }}" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="form-label">Product Description</label>
                            <textarea class="form-control" placeholder="Describe the product...." name="description">{{ $product->description }}</textarea> 
                        </div>

                        <div class="mb-3">
                            <label for="form-label">Product Price</label>
                            <input type="number" class="form-control" placeholder="Enter the price...." value="{{ $product->price }}" name="price">  
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product Category</label>
                            <select class="form-select w-100" name="category">
                                <option value="">--Select--</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary w-75">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection