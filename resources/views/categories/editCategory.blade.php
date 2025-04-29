@extends('layouts.layout')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card p-4 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title">Edit Category</h2>
                        <div class="mb-3">
                            <label for="form-label">Edit</label>
                            <input type="text" class="form-control" value="{{ $category->name }}">
                        </div>
                            <div class="d-flex justify-content-center">
                                <form method="POST" action="{{ route('edited-category' , $category->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection