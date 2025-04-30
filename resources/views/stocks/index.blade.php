@extends('layouts.layout')

@section('content')
   
        
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card p-4 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center">{{ $product->name }}</h2>
                        <hr>
                        @foreach ($product->stock as $stock )
                        <h2 class="card-title text-center">{{ $stock->stock }}</h2>
                        <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection