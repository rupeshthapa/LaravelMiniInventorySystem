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

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="#" class="btn btn-outline-warning me-5">Edit</a>

                        <form class="d-inline">
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
@endsection