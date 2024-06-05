<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UsersController extends Controller
{
    //
    public function index(Request $request){
        $search=$request->input('keyword');
        if(isset($search)){
            $users=User::where('username','like','%'.$search.'%')->get();
        }else{
            $users=User::get();
        }
        return view('users.search',(['users'=>$users,'search'=>$search]));
    }

    public function store($userId){
        Auth::user()->follows()->attach($userId);
        return back();
    }

    public function destroy($userId){
        Auth::user()->follows()->detach($userId);
        return back();
    }

    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }
}
