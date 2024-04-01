<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function showLoginForm()
  {
    return view('auth.login');
  }

  public function login(Request $request)
  {
    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      error_log('User logged in');
      return redirect()->intended('dashboard');
    }

    error_log($credentials['email']);
    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ]);
  }
}
