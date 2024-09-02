@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Reservation Details
                </div>
                <div class="card-body">
                    <form action="{{ route('booking.store') }}" method="post">
                        @csrf
                        <div class="ticket-info">

                                <table class="table">
                                    <tr>
                                        <td>
                                            <strong>User ID:</strong> 
                                        </td>
                                        <td>
                                            {{ $user->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>User Name:</strong>
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Stade ID:</strong> 
                                        </td>
                                        <td>
                                            {{ $stade->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Stade Name:</strong> 
                                        </td>
                                        <td>
                                            {{ $stade->title }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Total Price:</strong> 
                                        </td>
                                        <td>
                                            {{$stade->price }} DH
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Reserved For :</strong> 
                                        </td>
                                        <td>
                                            <input type="date" required name="date" required class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>check in Time:</strong> 
                                        </td>
                                        <td>
                                            <input type="time" required name="time_in" class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>check out Time:</strong> 
                                        </td>
                                        <td>
                                            <input type="time" required name="time_out" class="form-control" required>
                                        </td>
                                    </tr>
                                            
                                        

                                    <tr>
                                        <td>
                                            <strong>Payment Method:</strong> 
                                        </td>
                                        <td>
                                            <select name="payment_method" required class="form-select">
                                                <option value="credit_card">Credit Card</option>
                                                <option value="paypal">PayPal</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Credit Card Number:</strong> 
                                        </td>
                                        <td>
                                            <input type="text" name="credit_card_number" required class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Expiration Date:</strong> 
                                        </td>
                                        <td>
                                            <input type="text" name="expiration_date" class="form-control" placeholder="MM/YYYY" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>CVV:</strong> 
                                        </td>
                                        <td>
                                            <input type="text" name="cvv" class="form-control" required>
                                        </td>
                                    </tr>

                                </table>
                                <input type="hidden" name="stadeid" value="{{ $stade->id }}" class="form-control" required>
                            
                        </div>
                        <div class="ticket-button">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-secondary" onclick="window.history.back()">Back</button>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button class="btn btn-primary" onclick="return confirm('Are you sure you want to validate this booking?')">Reserve</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
    

</script>
@endsection
