<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
  public function show($task_list_id)
  {
    $taskList = TaskList::findOrFail($task_list_id);

    // Check if the authenticated user owns the task list
    if ($taskList->user_id !== auth()->id()) {
      abort(403, 'Unauthorized access.'); // Return a 403 Forbidden response
    }

    $tasks = Task::where('task_list_id', $task_list_id)->get()->groupBy('task_status');
    $order = ['in_progress', 'pending', 'completed']; // Define your custom order here

    $tasks = $tasks->sortBy(function ($value, $key) use ($order) {
      return array_search($key, $order);
    });
    $taskArray = $tasks->toArray();


    return view('tasklist.show', ['taskList' => $taskList, 'tasks' => $taskArray]);
  }

  public function addTask(Request $request, $task_list_id)
  {
    $request->validate([
      'task_name' => 'required|string|max:255',
    ]);

    $task = new Task();
    $task->task_name = $request->task_name;
    $task->task_status = 'pending';
    $task->task_list_id = $task_list_id;
    $task->save();

    return redirect()->route('tasklist.show', ['id' => $task_list_id]);
  }

  public function destroy($task_list_id)
  {
    $taskList = TaskList::findOrFail($task_list_id);

    // Check if the authenticated user owns the task list
    if ($taskList->user_id !== auth()->id()) {
      abort(403, 'Unauthorized access.'); // Return a 403 Forbidden response
    }
    $tasks = Task::where('task_list_id', $task_list_id)->delete();
    $taskList->delete();
    return redirect()->route('dashboard');
  }

  public function store(Request $request)
  {
    $request->validate([
      'tasklist_name' => 'required|string|max:255',
    ]);

    $taskList = new TaskList();
    $taskList->tasklist_name = $request->tasklist_name;
    $taskList->user_id = auth()->id();
    $taskList->tasklist_description = $request->tasklist_description ? $request->tasklist_description : '';
    $taskList->save();

    return redirect()->route('dashboard');
  }

  public function editview($task_list_id)
  {
    $taskList = TaskList::findOrFail($task_list_id);
    error_log('taskList: ' . $taskList);

    // Check if the authenticated user owns the task list
    if ($taskList->user_id !== auth()->id()) {
      abort(403, 'Unauthorized access.'); // Return a 403 Forbidden response
    }

    return view('tasklist.edit', ['taskList' => $taskList]);
  }

  public function edit($id)
  {
    $taskList = TaskList::findOrFail($id);

    // Check if the authenticated user owns the task list
    if ($taskList->user_id !== auth()->id()) {
      abort(403, 'Unauthorized access.');
    }

    return view('tasklist.edit', ['taskList' => $taskList]);
  }
  public function update(Request $request, $id)
  {
    $taskList = TaskList::findOrFail($id);

    // Check if the authenticated user owns the task list
    if ($taskList->user_id !== auth()->id()) {
      abort(403, 'Unauthorized access.');
    }

    $taskList->update($request->all());

    return redirect()->route('dashboard');
  }
}
