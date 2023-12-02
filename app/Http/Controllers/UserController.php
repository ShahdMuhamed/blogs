<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    //show form
    public function create(){
        return view('users.register');
    }

    public function store(Request $request){

        $validatedData = $request-> validate([
            'name' => ['required' , 'min:3'],
            'email' => ['required' , 'email'],
            'password'=>'required|confirmed|min:6',
            'role'=>'required'
       ]);
         $validatedData['password'] = bcrypt($validatedData['password']);
         $user = User::create($validatedData);
         Auth::login($user);
         return redirect('/blogs');
    }



    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/blogs');

    }


    public function login(){
        return view('users.login');
    }


    public function authenticate(Request $request){
        $validatedData = $request->validate([
            'email' => 'required',
            'password'=>'required'
        ]);
        if(Auth::attempt($validatedData)){
            $request->session()->regenerate();
            return redirect('/blogs');

        }
        return back()->withErrors(['email' => 'Invalid']);

    }

}
