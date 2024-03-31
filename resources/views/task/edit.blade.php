@extends('layouts.app')

@section('content')

<form action="{{ route('task.update', $task->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
  @csrf
  @method('PUT')

  <div class="mb-4">
    <label for="task_name" class="block text-gray-700 font-bold mb-2">Task Name:</label>
    <input type="text" name="task_name" id="task_name" value="{{ $task->task_name }}" required class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:border-blue-500">
  </div>

  <div class="mb-4">
    <label for="task_status" class="block text-gray-700 font-bold mb-2">Task Status:</label>
    <select name="task_status" id="task_status" required class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:border-blue-500">
      <option value="pending" @if($task->task_status == 'pending') selected @endif>Pending</option>
      <option value="in_progress" @if($task->task_status == 'doing') selected @endif>Doing</option>
      <option value="completed" @if($task->task_status == 'completed') selected @endif>Completed</option>
    </select>
  </div>

  <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Update Task</button>
</form>

@endsection