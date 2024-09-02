@extends('layouts.app')

@section('content')
<div class="container">
    
<div class="row justify-content-center"> 
        <div class="col-md-8">
            <div class="card">
                <div class="">
                    <h1 class="title fw-bold mb-5" style="text-align: center;margin-top: 25px;">My Profile :</h1>
                </div>
    <form class="form m-4" id="editForm" action="{{ route('profile.update') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone : </label>
            <input type="text" class="form-control" name="phone" value="{{ $user->phone_number }}" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" title="Save" onclick="return confirm('Are you sure you want to save changes?')">Save</button>
        </div>
        <a href="./home" class="btn btn-danger" title="Cancel">Discard</a>

    </form>
</div>
        </div>
</div>
@endsection
