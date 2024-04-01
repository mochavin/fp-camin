@extends('layouts.app')

@section('content')

<form action="{{ route('tasklist.update', $taskList->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
  @csrf
  @method('PUT')

  <div class="mb-4">
    <label for="tasklist_name" class="block text-gray-700 font-bold mb-2">Tasklist Name:</label>
    <input type="text" name="tasklist_name" id="tasklist_name" value="{{ $taskList->tasklist_name }}" required class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:border-blue-500">
  </div>

  <div class="mb-4">
    <label for="tasklist_description" class="block text-gray-700 font-bold mb-2">Tasklist Description:</label>
    <textarea name="tasklist_description" id="tasklist_description" required class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:border-blue-500">{{ $taskList->tasklist_description }}</textarea>
  </div>

  <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Update Task List</button>
</form>

@endsection