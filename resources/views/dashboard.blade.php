@extends('layouts.app')

@section('content')
<div class="flex flex-col">
  <h1 class="text-2xl font-bold mb-4">Dashboard Todolist</h1>
  <div class="flex items-center mb-4">
    @if (auth()->check())
    <h2 class="text-xl font-semibold">Hello, {{ auth()->user()->name }}!</h2>
    @endif
  </div>


  <div class="flex items-center mb-4">
    <input type="text" class="w-full rounded-l-lg border border-gray-300 py-2 px-4" placeholder="Add a task list">
    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r-lg">Add</button>
  </div>

  <ul class="bg-white overflow-hidden rounded-md divide-y divide-gray-200 shadow-lg">
    @foreach ($taskLists as $task)
    <li class="px-4 py-3 hover:bg-gray-100 flex items-center">
      <a href="{{ route('tasklist.show', ['id' => $task->id]) }}">{{ $task->tasklist_name }}</a>
      <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded-md ml-auto">
        <i class="fas fa-trash-alt"></i>
      </button>
    </li>
    @endforeach
  </ul>
</div>
@endsection