@extends('layouts.layout')


@section('content')
<h2 class="text-center">{{$category->name}} Products</h2>
        @foreach ($products as $product )
        <div class="container my-5">
                    <div class="card p-4 shadow-sm">
                        <div class="card-body">
                            <p>ID: {{ $product->id }}</p>
                            <p>Name: {{ $product->name }}</p>
                            <p>Description: {{ $product->description }}</p>
                            <p>Price: Rs. {{ $product->price }}</p>
                            <p>Stock: {{ $product->stock_sum_stock ?? '0' }} Remaining</p>
                            <p>Category Name: {{ $product->categories->name }}</p>
                        </div>
                    </div>
                </div>
            
        @endforeach
@endsection