@extends('layouts.layout')

@section('content')
    {{ Auth::user()->name }}
@endsection