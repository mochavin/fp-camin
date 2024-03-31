@extends('layouts.app')

@section('content')
<div class="dashboard mb-4">
  <a href="/dashboard" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md mt-2">Go to Dashboard</a>
</div>
<ul class="max-w-md mx-auto bg-white rounded-lg shadow-lg overflow-hidden p-4">
  <li class="border-b border-gray-200">
    <h1 class="font-bold text-lg px-6 py-4 bg-gray-100">{{ $taskList->tasklist_name }}</h1>
  </li>
  @foreach ($tasks as $task)
  <li class="flex justify-between items-center border-b border-gray-200 hover:bg-gray-100">
    <span class="px-6 py-4">{{ $task['task_name'] }}</span>
    <div class="flex">
      <button class="mx-1 text-blue-500 hover:text-blue-700">
        <i class="fas fa-edit" style="padding: 0 5px;"></i>
      </button>
      <form action="{{ route('task.delete', ['id' => $task['id']]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="mx-1 text-red-500 hover:text-red-700">
          <i class="fas fa-trash" style="padding: 0 5px;"></i>
        </button>
      </form>
    </div>
  </li>
  @endforeach
  <form action="{{ route('tasklist.add', ['id' => $taskList->id]) }}" method="POST" class="mt-4">
    @csrf
    <div class="flex items-center">
      <input type="text" name="task_name" placeholder="Enter task name" required class="flex-grow border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
      <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md">Add Task</button>
    </div>
  </form>
</ul>




@endsection