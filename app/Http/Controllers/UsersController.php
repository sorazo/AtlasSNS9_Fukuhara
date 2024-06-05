<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
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
        $users_id=User::whereIn('id',Auth::user()->follows()->pluck('followed_id'))->get();
        $follow_id=Auth::user()->follows()->pluck('followed_id');
        $followLists=Post::with('user')->whereIn('user_id',$follow_id)->latest()->get();
        return view('follows.followList',['followLists'=>$followLists,'users_id'=>$users_id]);
    }

    public function followerList(){
        $users_id=User::whereIn('id',Auth::user()->follower()->pluck('following_id'))->get();
        $follow_id=Auth::user()->follower()->pluck('following_id');
        $followLists=Post::with('user')->whereIn('user_id',$follow_id)->latest()->get();
        return view('follows.followerList',['followLists'=>$followLists,'users_id'=>$users_id]);
    }
}
