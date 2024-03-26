<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  public function showRegistrationForm()
  {
    return view('auth.register');
  }

  public function register(Request $request)
  {
    $request->validate([
      'name' => ['required', 'max:255'],
      'email' => ['required', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'confirmed', 'min:8'],
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    auth()->login($user);

    return redirect()->route('dashboard');
  }
}
