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
                <th>Stock</th>
                <th>Categroy_ID</th>
                <th>Categroy_Name</th>
                <th>Actions</th>
            </tr>
            
        </thead>
        <tbody>

            @foreach ($products as $product )
            @php
                // dd($product->stock_sum_stock);
            @endphp
           
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->stock_sum_stock ?? '0'}}</td>
                    <td>{{$product->category_id}}</td>
                    <td>{{$product->categories->name}}</td>
                    
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-warning me-2" value="{{ $product->id }}">Edit</a>
                        <form class="d-inline" method="POST" action="{{ route('products.destroy', $product->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger me-2">Delete</button>
                        </form>
                        
                        <a class="btn btn-outline-success me-2" href="{{ route('stocks.create', ["product_id" => $product->id]) }}">Add Stock</a>

                        <a class="btn btn-outline-info me-2" href="{{ route('stocks.index', $product->id) }}">View Stock</a>

                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#showDetails-{{ $product->id }}">Show</button>
                        <div class="modal fade" id="showDetails-{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <p class="lead text-bold">ID: {{$product->id}}</p>
                                    <p class="lead text-bold">Name: {{$product->name}}</p>
                                    <p class="lead text-bold">Description: {{$product->description}}</p>
                                    <p class="lead text-bold">Price: Rs. {{$product->price}}</p>
                                    <p class="lead text-bold">Stock: {{$product->stock_sum_stock}} Remaining</p>
                                    <p class="lead text-bold">Category ID: {{$product->category_id}}</p>
                                    <p class="lead text-bold">Category Name: {{$product->categories->name}}</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>

                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
@endsection