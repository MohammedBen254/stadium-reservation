@extends('layouts.app')

@section('title', 'Home')
{{-- @endsection --}}
<style>
.add-stadium {
    border-radius: 10px;
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 9999;
    color: white;
    padding: 8px;
    background-color: #0d6efd;
    border: 2px solid #0d6efd;
}
  .add-stadium:hover{
    background-color: white;
    color: black;
    border: 2px solid #0d6efd;
    transition: all ease 0.4s;
  }
  .add-text {
    text-decoration: none;
    font-size: 15px;
  }
</style>  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row">
                        @foreach ($stades as $stade)
                        @if (($stade->status==='active' & Auth::user()->role_as === 0) || ( Auth::user()->role_as === 1))
                        <div class="col-md-12 mb-3">
                            <div class="card" style="border: 1px solid black;">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <img src="{{ asset('stades/image/' . $stade->image) }}" class="img-fluid rounded" style="margin: 2px; width: 100%; height: 200px;" alt="Image">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $stade->title }}
                                            @for ($i = 0; $i < $stade->reviews; $i++)
                                                <img src="{{ asset('stades/image/star-reviews.png') }}" alt="reviews" width="15">
                                            @endfor
                                            ( {{$stade->reviews}}.0 )
                                        </h4>
                                            <p class="card-text">{{ $stade->description }}</p>
                                            <div class="card-footer d-flex justify-content-between align-items-center p-2">
                                                <span class="text-dark fw-bold">Price: {{ $stade->price }}DH</span>
                                                <div class="card-buttons">
                                                    @if (Auth::user()->role_as === 1)
                                                        <a href="{{ route('stades.update', ['stade' => $stade->id]) }}" class="btn btn-warning">Edit</a>
                                                        <form action="{{ route('stades.delete', ['id' => $stade->id]) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this stade?')">Delete</button>
                                                        </form>
                                                    @else
                                                        <a href="{{ route('ticket.show', ['stade' => $stade->id]) }}" class="btn btn-primary">Reserve Stade</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>

                    @if (Auth::user()->role_as === 1)
                        <a href="/addStade" class="add-stadium">
                            <span class="add-text">Add New Stade</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection