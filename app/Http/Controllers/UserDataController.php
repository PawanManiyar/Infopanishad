<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    //

    public function index(){
        $users=User::where('is_active',1)->get();
        return view('usersData',compact('users'));
    }
    public function disableUser(Request $request){
        $us=$request->input('inactive');

        foreach ($us as $req) {
            $user=User::find($req);
            $user->is_active=false;
            $user->save();
        }
        
        return redirect()->back();
   
    }
}
