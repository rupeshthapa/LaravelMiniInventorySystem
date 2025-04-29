@extends('layouts.layout')

@section('content')
                            @if (session('success'))
                            <p style="color: green;">{{ session('success') }}</p>
                        @endif 

                        @if (session('warning'))
                            <p style="color: blue;">{{ session('warning') }}</p>
                        @endif 
                        @if (session('danger'))
                            <p style="color: red;">{{ session('danger') }}</p>
                        @endif 
<div class="container my-5 d-flex justify-content-start">
    <form method="GET" action="{{ route('products.create') }}">
        <button class="btn btn-primary d-flex align-items-center">
            <i class="bi bi-plus-circle me-2"></i> New Product
        </button>
    </form>
</div>

<div class=" d-flex justify-content-center align-items-center">
    <table class="table table-bordered w-75">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Categroy_ID</th>
                <th>Categroy_Name</th>
                <th>Actions</th>
            </tr>
            
        </thead>
        <tbody>

            @foreach ($products as $product )
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->category_id}}</td>
                    <td>{{$product->categories->name}}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-warning me-2" value="{{ $product->id }}">Edit</a>
                        <form class="d-inline" method="POST" action="{{ route('products.destroy', $product->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
            <td></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection