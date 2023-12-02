<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('auth')->group(function () {
    Route::prefix('/blogs')
    ->name('blogs.')
    ->group(function () {
        //show blog form
        Route::get('/create' , [BlogController::class , 'create'])->middleware('makePost');

        //add blog
        Route::post('/' , [BlogController::class , 'store']);


        //show edit form
        Route::get('/{blog}/edit' , [BlogController::class, 'edit']);


        //update
        Route::put('/{blog}' , [BlogController::class, 'update']);


        //manage the posts
        Route::get('/manage' , [BlogController::class , 'manage']);

        Route::delete('/{blog}' , [BlogController::class, 'destroy']);

        //get all comments
        // /blog/{blog}/comments
        Route::get('/{blog}/comments' , [CommentController::class , 'index']);

        //delete comment
        // /blog/{blog}/comments/{comment}
        Route::delete('/{blog}/comments/{comment}' , [CommentController::class, 'destroy']);

        // add comment
        Route::post('/{blog}/comments' , [CommentController::class , 'store']);
    });
});

//get all blogs
Route::get('/blogs' , [BlogController::class , 'index'])->name('blog')

//show register form
Route::get('/register' , [UserController::class, 'create']);

//add user to database
Route::post('/users' , [UserController::class , 'store']);


//logout user
Route::post('/logout' , [UserController::class , 'logout']);

//login form
Route::get('/login' , [UserController::class , 'login'])->name('login');


//log user in
Route::post('/users/authenticate' , [UserController::class , 'authenticate']);


