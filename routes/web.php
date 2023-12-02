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
// add comment
Route::post('/comments' , [CommentController::class , 'store']);


//show blog form
Route::get('/blogs/create' , [BlogController::class , 'create'])->middleware('makePost');

//add blog
Route::post('/blogs' , [BlogController::class , 'store']);


//show edit form
Route::get('/blogs/{blog}/edit' , [BlogController::class, 'edit']);


//update
Route::put('/blogs/{blog}' , [BlogController::class, 'update']);


//manage the posts
Route::get('/blogs/manage' , [BlogController::class , 'manage']);


//delete post
Route::delete('/blogs/{blog}' , [BlogController::class, 'destroy']);

//get all comments
Route::get('/comments' , [CommentController::class , 'index']);

//delete comment
Route::delete('/comments/{comment}' , [CommentController::class, 'destroy']);

});

//get all blogs
Route::get('/blogs' , [BlogController::class , 'index']);

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


