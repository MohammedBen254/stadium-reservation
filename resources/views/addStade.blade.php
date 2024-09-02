@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="title fw-bold primary">Add New Stade :</h2>
                    <form action="{{ route('stades.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-2">
                            <label for="name" class="form-label">Stade name:</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-2">
                            <label for="description" class="form-label">Description:</label>
                            <input type="text" class="form-control" name="description" required>
                        </div>
                        <div class="mb-2">
                            <label for="size" class="form-label">Size:</label>
                            <input type="text" class="form-control" name="size" required>
                        </div>
                        <div class="mb-2">
                            <label for="price" class="form-label">Price:</label>
                            <input type="text" class="form-control" name="price" required>
                        </div>
                        <div class="mb-2">
                            <label for="city" class="form-label">City : </label>
                            <input type="text" class="form-control" name="city" required>
                        </div>
                        <div class="mb-2">
                            <label for="type" class="form-label">Type :</label>
                            <input type="text" class="form-control" name="type" required>
                        </div>
                        <div class="mb-2">
                            <label for="sport" class="form-label">Sport :</label>
                            <input type="text" class="form-control" name="sport" required>
                        </div>
                        <div class="mb-2">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" class="form-control" name="image" id="image" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to add this stade?')">Add</button>
                            
                        </div>
                    </form>
                    <a href="/home" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
