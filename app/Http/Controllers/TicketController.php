<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;

use App\Models\Stade;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    //
    public function showTicket($stade)
{
    $user = Auth::user();
    $stade = Stade::findOrFail($stade); 

    return view('ticket', compact('user', 'stade'));
}   


}
