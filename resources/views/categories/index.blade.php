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
    <form method="GET" action="{{ route('categories.create') }}">
        <button class="btn btn-primary d-flex align-items-center">
            <i class="bi bi-plus-circle me-2"></i> New Category
        </button>
    </form>
</div>


        <div class=" d-flex justify-content-center align-items-center">

            <table class="table table-bordered w-75">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td class="text-center">{{ $category->id }}</td>
                        <td class="text-center">{{ $category->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('categories.edit', $category->id ) }}" class="btn btn-outline-warning me-5" value="{{ $category->id }}">Edit</a>
    
                            <form class="d-inline text-center" method="POST" action="{{ route('categories.destroy', $category->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger" value="{{ $category->id }}">Delete</button>
                            </form>
                        </td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>

@endsection