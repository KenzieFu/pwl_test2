<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banners=Post::all()->take(5);
        $posts=Post::paginate(2);// paginate yg ini aja
        $recents=Post::orderBy('created_at','DESC')->get()->take(3);
        $categories=Category::all();
        

        return view('Blog.index',compact('banners','posts','recents','categories'));
    }

    public function search(Request $request)
    {
        $banners=Post::all()->take(5);
        $keywords=$request->input('keywords');
        $recents=Post::orderBy('created_at','DESC')->get()->take(3);
        $categories=Category::all();
        $posts=Post::where('title', 'LIKE', "%{$keywords}%")->orWhere('content','LIKE',"%{$keywords}%")->paginate(2);
       
        return view('Blog.index',compact('banners','posts','recents','categories'))->with('message',$keywords);

    }

    public function searchCate($id)
    {
        $banners=Post::all()->take(5);
        $cate=Category::find($id);
        $posts=Post::where('category_id','=',$id)->paginate(2);
        $recents=Post::orderBy('created_at','DESC')->get()->take(3);
        $categories=Category::all();
    
        return view('Blog.index',compact('banners','posts','recents','categories'))->with('cate',$cate->name);
    }


   
}

