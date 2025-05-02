@extends('layouts.layout')

@section('content')
   
        
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card p-4 shadow-sm">
                    <div class="card-body">
                        @if (session('danger'))
                            <p style="color: red;">{{ session('danger') }}</p>
                        @endif
                        @if (session('success'))
                            <p style="color: green;">{{ session('success') }}</p>
                        @endif
                        <h2 class="card-title text-center">{{ $product->name }}</h2>
                        <hr>
                        @foreach ($product->stock as $stock )
                        <h2 class="card-title text-center">{{ $stock->stock }}</h2>
                        <hr>
                        @endforeach
                        <form class="my-5" method="POST" action="{{ route('stocks.removeStock', $product->id) }}">
                            @csrf
                            <input type="number" class="form-control border border-2" name="removeStock">
                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-danger">Remove Stock</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection