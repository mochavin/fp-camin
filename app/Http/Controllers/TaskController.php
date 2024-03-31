<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  public function delete($id)
  {
    $task = Task::findOrFail($id);
    $task->delete();
    return redirect()->back();
  }

  public function edit($id)
  {
    $task = Task::findOrFail($id);

    // error_log('Task ID: ' . $task);

    $taskListsId = $task->task_list_id;
    $taskList = TaskList::findOrFail($taskListsId);


    // Check if the authenticated user owns the task
    if ($taskList->user_id !== auth()->id()) {
      abort(403, 'Unauthorized access.');
    }

    return view('task.edit', ['task' => $task]);
  }

  public function update(Request $request, $id)
  {
    $task = Task::findOrFail($id);
    $taskListsId = $task->task_list_id;
    $taskList = TaskList::findOrFail($taskListsId);

    // Check if the authenticated user owns the task
    if ($taskList->user_id !== auth()->id()) {
      abort(403, 'Unauthorized access.');
    }

    $task->update($request->all());

    return redirect()->route('tasklist.show', ['id' => $task->task_list_id]);
  }
}
