<?php
    namespace App\Http\Controllers;

    use App\Models\Booking;
use App\Models\Stade;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Intervention\Image\Facades\Image;


    
use Illuminate\Support\Facades\View;


class BookingController extends Controller
    {

        public function downloadTicketImage($bookingId)
        {
            $booking = Booking::findOrFail($bookingId);
    
            
            return view('print', compact('booking'));
        }
    
        
   
        public function index()
        {
            if(Auth::user()->role_as===1){
                
            $bookings = Booking::all();
            if ($bookings->isEmpty()){
             
                $bookings=false;
                $message = "Database don't have any reservations.";
                return view('booking', compact('message', 'bookings'));   
            }else {
                return view('booking', compact('bookings'));
            }
        }else {
            $userId = Auth::id();
            $bookings = Booking::where('user_id', $userId)->get();
        
            if ($bookings->isEmpty()) {
                $bookings=false;
                $message = "You don't have any reservations.";
                return view('booking', compact('message', 'bookings'));
            } else {
                return view('booking', compact('bookings'));
            }
        }
        
        
        }
        
        public function store(Request $request)
        {   
            $stadeid = $request->input('stadeid');
            $stade = Stade::findOrFail($stadeid);
            $bookings = new Booking();
            $user = Auth::user();
            $bookings->user_id = $user->id;
            $bookings->user_name = $user->name;
            $bookings->stade_id = $stade->id;
            $bookings->stade_name = $stade->title;
            $bookings->stade_image = $stade->image;
            $bookings->date = $request->input('date');
            $bookings->checkin_time = $request->input('time_in');
            $bookings->checkout_time = $request->input('time_out');
            $bookings->totalprice = $stade->price;
            $bookings->credit_card_number = $request->input('credit_card_number');
            $bookings->cvv = $request->input('cvv');
            $bookings->payment_method = $request->input('payment_method');
            $bookings->expiration_date = $request->input('expiration_date');
            $bookings->status = "";
            $bookings->save();
            return redirect()->route('booking')->with('success', 'Booking created successfully.');
        }


        public function delete($id)
{
    
    $booking = Booking::find($id);

    
    if (!$booking) {
        return redirect()->route('booking.index')->with('error', 'Booking not found');
    }

    
    $booking->delete();

    
    return redirect()->route('booking.index')->with('success', 'Booking deleted successfully');
}

    }
    ?>