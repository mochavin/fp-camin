@extends('layouts.app')

@section('content')
<div class="flex flex-col">
  <h1 class="text-2xl font-bold mb-4">Dashboard Todolist</h1>
  <div class="flex items-center mb-4">
    @if (auth()->check())
    <h2 class="text-xl font-semibold">Hello, {{ auth()->user()->name }}!</h2>
    @endif
  </div>


  <form class="bg-white rounded-lg shadow-md p-6 mb-4" action="{{ route('tasklist.store') }}" method="POST">
    @csrf
    <div class="flex">
      <input type="text" class="w-full rounded-l-lg border border-gray-300 py-2 px-4 focus:outline-none focus:border-blue-500" placeholder="Add a task list" name="tasklist_name">
      <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r-lg" type="submit">Add</button>
    </div>
    <div class="mb-4">
      <label for="tasklist_description" class="block text-gray-700 font-bold mb-2">Description:</label>
      <textarea name="tasklist_description" id="tasklist_description" rows="1" class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:border-blue-500" required></textarea>
    </div>
  </form>


  <ul class="bg-white overflow-hidden rounded-md divide-y divide-gray-200 shadow-lg">
    @foreach ($taskLists as $task)
    <li class="px-4 py-3 hover:bg-gray-100 flex items-center">
      <a href="{{ route('tasklist.show', ['id' => $task->id]) }}" class="text-blue-600 hover:underline">{{ $task->tasklist_name }}</a>
      <div class="ml-auto flex">
        <a href="{{ route('tasklist.edit', ['id' => $task->id]) }}" class="mx-1 text-yellow-500 hover:text-yellow-700">
          <i class="fas fa-edit" style="padding: 0 5px;"></i>
        </a>
        <form action="{{ route('tasklist.destroy', ['id' => $task->id]) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="mx-1 text-red-500 hover:text-red-700">
            <i class="fas fa-trash" style="padding: 0 5px;"></i>
          </button>
        </form>
      </div>
    </li>
    @endforeach
  </ul>

</div>
@endsection