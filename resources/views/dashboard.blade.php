@extends('layouts.layout')

@section('content')
    {{ Auth::user()->name }}
    <p class="lead">If you want to add products: <a href="#">Add Products</a></p>
    <p class="lead">If you want to add categories: <a href="#">Add Categories</a></p>
@endsection