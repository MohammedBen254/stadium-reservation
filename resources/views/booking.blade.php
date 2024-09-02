@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Booking</h1>
        <div class="row">
            @if ($bookings)
            @foreach ($bookings as $booking)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('stades/image/' . $booking->stade_image) }}" class="card-img-top" alt="Image">
                        <div class="card-body">
                            <h4 class="card-title text-danger text-decoration-underline fw-bold">Booking ID : {{ $booking->id }}</h4>
                            <p class="card-text"><strong>User : </strong>{{ $booking->user_name }}</p>
                            <p class="card-text"><strong>Stade Id :</strong> {{ $booking->stade_id }}</p>
                            <p class="card-text"><strong>Stade Name :</strong> {{ $booking->stade_name }}</p>
                            <p class="card-text"><strong>Date : </strong>{{ $booking->date }}</p>
                            <p class="card-text"><strong>Total Price : </strong > {{ $booking->totalprice . ' Dh'}}</p>
                             
                            <p class="card-text"><strong>Payment Method : </strong>{{ $booking->Payment_Method }}</p>
       
                            

                            <p class="card-text"><strong>Created At : </strong>{{ $booking->created_at }}</p>
                            
                            @if (Auth::user()->role_as === 1)
                                <a href="{{ route('booking.delete', $booking->id) }}" class="btn btn-danger">Delete</a>
                            @else
                                <a href="{{ route('booking.print', $booking->id) }}" class="btn btn-primary" target="_blank">Print Ticket</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            @else
                <p>{{$message}}</p>
            @endif
        </div>
        
        <div class="row justify-content-start">
            <div class="col-md-6">
                <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Back to Home</a>
            </div>
        </div>
    </div>


@endsection
