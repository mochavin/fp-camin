<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  public function delete($id)
  {
    $task = Task::findOrFail($id);
    $task->delete();
    return redirect()->back();
  }
}
