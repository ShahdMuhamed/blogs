<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
session_start();
class CommentController extends Controller
{
    //
 public function index(){

    $comments = Comment::with('user')->get();
        return view('comments.index' , [
           'comments' =>  Comment::filter(request(['blog_id']))->get()
        ]);

    }

    public function store(Request $request){
        // dd($request);
        $validatedData = $request->validate([
            'comment_content'=> 'required'
        ]);
        $blog_id = $_SESSION['blog_id'];
        $validatedData['blog_id'] = $_SESSION['blog_id'];
        $validatedData['user_id'] = Auth::id();
        // $validatedData['blog_id'] = $blog_id;
        Comment::create($validatedData);
        unset($_SESSION['blog_id']);

        return redirect("/comments?blog_id=$blog_id");

    }

    public function destroy(Comment $comment){
        $blog_id = $_SESSION['blog_id'];
        $comment->delete();
        return redirect("/comments?blog_id=$blog_id");
    }

}
