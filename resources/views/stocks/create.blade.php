@extends('layouts.layout')
@section('content')
<div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card p-4 shadwom-sm">
                        <div class="card-body">
                            <h2 class="card-title text-center">Add Stock</h2>
                            @if (session('success'))
                                <p style="color: green;">{{ session('success') }}</p>
                            @endif
                            @if (session('danger'))
                                <p style="color: red;">{{ session('danger') }}</p>
                            @endif
                            <form method="POST" action="{{ route('stocks.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="form-label">New Stock</label>
                                    <input type="hidden" name="product_id" value="{{ $product_id }}">
                                    <input type="number" class="form-control" name="stock">
                                    @error('stock')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-primary w-75" type="submit">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection