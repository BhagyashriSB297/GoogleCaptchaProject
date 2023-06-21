<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\User;

// use App\Exceptions\UserNotFoundException;

class UserController extends Controller
{
    public function create()
    {
        return view('create_user');
    }

    // public function read($id)
    // {
    //     $userdata = User::find($id);
        
        
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        User::create($request->all());
        return "Successfully Created";
      
    }
}
