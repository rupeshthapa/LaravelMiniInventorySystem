@extends('layouts.layout')
@section('content')
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card p-4 shadwom-sm">
                        <div class="card-body">
                            <h2 class="card-title text-center">Add Category</h2>
                            @if (session('success'))
                                <p style="color: green;">{{ session('success') }}</p>
                            @endif
                            @if (session('danger'))
                                <p style="color: red;">{{ session('danger') }}</p>
                            @endif
                            <form method="POST" action="{{ route('add-category') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="form-label">New Category</label>
                                    <input type="text" class="form-control" name="name">
                                    @error('name')
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
                            <a href="{{ route('edit-category', $category->id ) }}" class="btn btn-outline-warning me-5" value="{{ $category->id }}">Edit</a>
    
                            <form class="d-inline text-center" method="POST" action="{{ route('deleted-category', $category->id) }}">
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