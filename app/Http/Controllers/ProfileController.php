<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit(){
        return view('profile.profile');
    }

    public function update(Request $request){
        $user=Auth::user();
        $user->username=$request->username;
        $user->mail=$request->mail;
        $user->password=Hash::make($request->password);
        if(!empty($request->bio)){
            $user->bio=$request->bio;
        }
        if(!empty($request->image)){
            // 画像の名前
            $image_name=$request->file('image')->getClientOriginalName();
            // 画像の名前で（見た目の）画像を保存
            $image=$request->file('image')->storeAs('/public',$image_name);
            // 実際にDBに登録するのは画像の名前
            $user->images=$image_name;
        }
        $user->update();
        return redirect('top');
    }

    public function show($userId){
        $user=User::where('id',$userId)->first();
        $posts=Post::where('user_id',$userId)->latest()->get();
        return view('profile.otherProfile',['posts'=>$posts,'user'=>$user]);
    }
}
