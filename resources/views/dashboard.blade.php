@extends('layouts.layout')

@section('content')
<h2 class="text-center my-5">Welcome {{ Auth::user()->name }}</h2>
@endsection