<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{

    public function update(Request $request)
    {
        $user = User::find();

        if (!$user) {
            
        }

        $user->name = $request->input('name');
        
        $user->email = $request->input('email');
        $user->save();

        
        
    }
    public function ShowUsers(){
        $users=User::all();
        return view('users', compact('users'));
    }
    public function show()
    {
        $user = Auth::user();

        if (!$user) {
           
            return redirect()->route('login');
        }


        return view('profile', compact('user'));
    }
    public function setAdmin($id){
        $user = User::find($id);
        if ($user) {
            $user->role_as = 1;
            $user->save();
            $users=User::all();
            return view('users', compact('users'));
            
        }
            
    }
    public function deleteUser($id){
        User::where('id', $id)->delete();
        $users=User::all();
        return view('users', compact('users'));
    
    }
    public function removeAdmin($id){
        $countadmin=User::where('role_as', 1)->count();
        if ($countadmin > 1){

            $user = User::find($id);
            if ($user) {
            $user->role_as = 0;
            $user->save();
            $users=User::all();
            return view('users', compact('users'));
        }   
            
        }
    }
}
