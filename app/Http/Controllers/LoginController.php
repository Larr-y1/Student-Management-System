<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function showlogin()
    {
        return view('Login');
    }
    public function login(Request $request)
    {
  //validation
   $input = $request->all();
   
    $this->validate($request, [
    'email' => 'required|email',
    'password' => 'required',
   ]);;
   $credentials = $request->only('email', 'password') ;

   if (auth()->attempt($credentials))
   {
    $user = auth()->user();

    if ($user->usertype == 'Admin'){
        return redirect('/admin/home');
    }
    elseif($user->usertype == 'student')
    {
        return redirect('/student/home');
    }
   }
   return redirect()->route('login')->with('error', 'email or password is invalid');
  }
  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
  }
}