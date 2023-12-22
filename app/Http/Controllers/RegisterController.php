<?php

namespace App\Http\Controllers;

use session;
use App\Models\application;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Hash;
class RegisterController extends Controller
{
    //
     function register()
    {
        return view('Register');
    }
    public function store(Request $request): RedirectResponse
    {
       $request->validate([
        'firstname'=>'required',
        'lastname'=>'required',
        'phone'=>'required', 
        'email'=>'required|email|unique:users',
        'password'=>'required|min:5|max:12',
        'date'=>'required',
        'gender'=>'required',
       ]);

        $input= $request->all();
        application::create([
            'firstname'=>$input['firstname'],
            'lastname'=>$input['lastname'],
            'contact'=>$input['phone'],
            'email'=>$input['email'],
            'password'=> 'Hash'::make($input['password']),
            'DOB'=>$input['date'],
            'gender'=>$input['gender'],

        ]);
// Flash a success message to the session
session()->flash('success', 'Application sent successfully!');

// Redirect back to the homepage
return redirect()->route('Home');

    }

}
