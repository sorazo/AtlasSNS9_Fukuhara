<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $posts=Post::get();
        return view('posts.index',['posts' => $posts]);
    }

    public function store(Request $request)
    {
        Post::create([
            'user_id' => Auth::user()->id,
            'post' => $request->content,
        ]);

        return redirect('top');
    }

    public function update(Request $request)
    {
        $update_post=Post::find($request->post_id);
        $update_post->post=$request->update_content;
        $update_post->update();

        return redirect('top');
    }

    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();

        return redirect('top');
    }
}
