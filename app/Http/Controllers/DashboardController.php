<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  public function index()
  {
    // Check if the user is authenticated
    if (Auth::check()) {
      // User is authenticated, return the dashboard view
      $taskLists = TaskList::where('user_id', Auth::id())->get();

      return view('dashboard', ['taskLists' => $taskLists]);
    } else {
      // User is not authenticated, redirect to the login page
      return redirect()->route('login');
    }
  }

  // Add other controller methods here
}
