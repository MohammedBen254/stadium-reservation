@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="title fw-bold primary">Update Stade:</h2>
                    <form action="{{ route('stades.update', ['stade' => $stade->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label for="name" class="form-label">Stade name:</label>
                            <input type="text" class="form-control" name="name" value="{{$stade->title}}" required>
                        </div>
                        <div class="mb-2">
                            <label for="description" class="form-label">Description:</label>
                            <textarea rows="3" class="form-control" name="description" required>{{$stade->description}}</textarea>
                        </div>
                        <div class="mb-2">
                            <label for="size" class="form-label">Size:</label>
                            <input type="text" class="form-control" name="size" value="{{$stade->size}}" required>
                        </div>
                        <div class="mb-2">
                            <label for="review" class="form-label">Review :</label>
                            <input type="text" class="form-control" name="review" value="{{$stade->reviews}}" required>
                        </div>
                        <div class="mb-2">
                            <label for="sport" class="form-label">Sport:</label>
                            <input type="text" class="form-control" name="sport" value="{{$stade->sport}}" required>
                        </div>
                        <div class="mb-2">
                            <label for="city" class="form-label">City:</label>
                            <input type="text" class="form-control" name="city" value="{{$stade->city}}" required>
                        </div>
                        <div class="mb-2">
                            <label for="type" class="form-label">Type :</label>
                            <input type="text" class="form-control" name="type" value="{{$stade->type}}" required>
                        </div>
                        <div class="mb-2">
                            <label for="price" class="form-label">Price:</label>
                            <input type="text" class="form-control" name="price" value="{{$stade->price}}" required>
                        </div>
                        <div class="mb-2">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" id="status">
                                <option value="active">Active</option>
                                <option value="desactive">Desactive</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update Stade</button>
                    </form>
                    
                    <a href="{{ route('home') }}" class="btn btn-danger mt-3" >Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
