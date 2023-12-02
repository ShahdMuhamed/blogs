<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::with('user')->get();

        return view('blogs.index', compact('blogs')
      
    );
    }


    public function create()
    {
        return view('blogs.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'subject' => 'required',
                'content' => 'required',

            ]
        );

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        $validatedData['user_id'] = auth()->id();
        Blog::create($validatedData);
        return redirect('/blogs');
    }


    public function edit(Blog $blog){
        return view('blogs/edit' ,[
            'blog'=> $blog
        ]);

    }


    public function update(Request $request , Blog $blog){
        $validatedData = $request->validate(
            [
                'subject' => 'required',
                'content' => 'required',

            ]
        );
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }
        $blog->update($validatedData);
        return redirect('/blogs');
    }

    public function manage(){
        return view('blogs/manage' ,[
            'blogs' => auth()->user()->blog()->get()
        ]);
    }

    public function destroy(Blog $blog){
        $blog->delete();
        return redirect('/blogs');
    }
}


