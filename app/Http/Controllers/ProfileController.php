<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile(){
        return view('profile.profile');
    }

    public function show($userId){
        $user=User::where('id',$userId)->first();
        $posts=Post::where('user_id',$userId)->latest()->get();
        return view('profile.otherProfile',['posts'=>$posts,'user'=>$user]);
    }
}
