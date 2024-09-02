<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        if (!$user) {
            
            return redirect()->route('login');
        }


        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            
            return redirect()->route('login');
        }
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number=$request->input('phone');
        $user->save();
        
        return view('profile', compact('user'))->with('message', 'Changes saved successfully!');

    }
    
}