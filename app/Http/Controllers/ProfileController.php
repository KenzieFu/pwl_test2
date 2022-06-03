<?php

namespace App\Http\Controllers;

use App\Models\Category;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories=Category::all();
        if(Auth::check())
        {
            return view('blog.profile',compact('categories'));
        }
        return redirect('/');
    }

    public function edit()
    {
        $categories=Category::all();
        if(Auth::check())
        {
            
            return view('Blog.editprofile',compact('categories'));
        }
        return redirect('/');
    }

    public function editprofile(Request $request)
    {
        
        $validateData=$request->validate(
        [
            'name'=>'required',
            'image'=>'image|file|max:1024'
        ],
        [
            'image.image'=>"Hanya menerima gambar"
        ]
    );
        $user=User::findorFail(auth()->user()->id);
        if($request->file('image')!=NULL)
        {
        $validatedData['image']=$request->file('image')->store('images');
        $user->name=$validateData['name'];
        $user->image=$validatedData['image'];
        $user->save();
        }
        else
        {
            $user->name=$validateData['name'];
            $user->image=auth()->user()->image;
            $user->save();
        }
        return redirect()->back()->with('success','Profile Telah di Update');

    }
}
