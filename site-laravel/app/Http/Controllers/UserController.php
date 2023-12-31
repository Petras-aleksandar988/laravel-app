<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // register form
  public function create(){
    return view('users.register');
  }

  //create New User
  public function store(){
    $formFields =  request()->validate([
        'name' => ['required', 'min:3'],
        'email' =>['required', 'email', Rule::unique('users', 'email')],
        'password' => ['required','confirmed', 'min:6' ],

    ]);

    $formFields['password'] = bcrypt($formFields['password']);
    
    // create user
    $user = User::create($formFields);

    // login user
    auth()->login($user);
   
    return redirect('/')->with('message', 'User created and logged in');


  }

  //logout 
  public function logout(){
    auth()->logout();
  request()->session()->invalidate();
 request()->session()->regenerateToken();

 return redirect('/')->with('message', 'you have been logout!!');

}

// show login form

public function login(){
    return view('users/login');

}
//  login user

public function authenticate(){

    $formFields =  request()->validate([
       
        'email' =>['required', 'email'],
        'password' => 'required',

    ]);

    if(auth()->attempt($formFields)){

        request()->session()->regenerate();
        return redirect('/')->with('message', 'You are now Login!!');
    }
    return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
}


}
