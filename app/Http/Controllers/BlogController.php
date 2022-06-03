<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\comment;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{

    
    // public function blog()
    // {
    //     return view('Blog.blog');
    // }

    public function about($id)
    {
        $categories=Category::all();
        $user=User::find($id);
        $posts=$user->posts()->paginate(2);
        return view('Blog.about',compact('user','posts','categories'));
    }

    public function deletepost($id)
    {
        $post=Post::findorFail($id);
        $post->delete();
        return redirect()->back();
    }


   

  

    public function find($id)
    {
        // $post=Post::findorFail($id);

        $post=Post::with('users')->get()->find($id);
        $categories=Category::all();
        $comments=comment::where('post_id','=',$id)->get();
        return view ('Blog.post-details',compact('post','categories','comments'));
    }

   
}