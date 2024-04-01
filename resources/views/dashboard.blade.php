@extends('layouts.app')

@section('content')
<div class="flex flex-col w-fit mx-auto lg:min-w-[400px]">
  @if (auth()->check())
  <h1 class="text-2xl font-bold mb-4">Hello, {{ auth()->user()->name }}!</h1>
  @endif

  <div class="flex gap-2 mb-4">
    <a href="{{ route('task.index', ['status' => 'in_progress']) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Doing</a>
    <a href="{{ route('task.index', ['status' => 'pending']) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Pending</a>
    <a href="{{ route('task.index', ['status' => 'completed']) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Completed</a>
  </div>

  <form class="bg-white rounded-lg shadow-md p-6 mb-4" action="{{ route('tasklist.store') }}" method="POST">
    @csrf
    <div class="flex">
      <input type="text" class="w-full rounded-l-lg border border-gray-300 py-2 px-4 focus:outline-none focus:border-blue-500" placeholder="Add a task list" name="tasklist_name">
      <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r-lg" type="submit">Add</button>
    </div>
    <div class="mb-4">
      <label for="tasklist_description" class="block text-gray-700 font-bold mb-2">Description:</label>
      <textarea name="tasklist_description" id="tasklist_description" rows="1" class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:border-blue-500"></textarea>
    </div>
  </form>

  <form class="mb-4 flex" action="{{ route('task.search') }}" method="GET" class="flex gap-4">
    <input type="text" name="search" placeholder="Search task" class="flex-grow rounded border border-gray-300 px-4 py-2 mr-2 focus:outline-none focus:border-blue-500">
    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Search</button>
  </form>

  @isset($tasks) @isset($search)
  <p class="mb-4">Search results for '{{ $search }}'</p>
  @foreach ($tasks->groupBy('task_status') as $status => $statusTasks)
  <div class="bg-white rounded-lg shadow-md p-4 mb-4">
    <h2 class="text-lg font-semibold">{{ ucfirst(str_replace('in_progress', 'doing', $status)) }}</h2>
    @foreach ($statusTasks as $task)
    <div class="flex gap-3 justify-between">
      <p>{{ $task->task_name }}</p>
      <p class="text-blue-600 hover:underline">
        <a href="{{ route('tasklist.show', ['id' => $task->taskList->id]) }}">{{ $task->taskList->tasklist_name }}</a>
      </p>
    </div>
    @endforeach
  </div>
  @endforeach
  @endisset
  @endisset

  @isset($tasks_filtered)
  @foreach ($tasks_filtered->groupBy('task_status') as $status => $statusTasks)
  <div class="bg-white rounded-lg shadow-md p-4 mb-4">
    <h2 class="text-lg font-semibold">{{ ucfirst(str_replace('in_progress', 'doing', $status)) }}</h2>
    @foreach ($statusTasks as $task)
    <div class="flex gap-3 justify-between">
      <p>{{ $task->task_name }}</p>
      <p class="text-blue-600 hover:underline">
        <a href="{{ route('tasklist.show', ['id' => $task->taskList->id]) }}">{{ $task->taskList->tasklist_name }}</a>
      </p>
    </div>
    @endforeach
  </div>
  @endforeach
  @endisset



  @isset($taskLists)
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
          <button type="submit" class="mx-1 text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this task list?')">
            <i class="fas fa-trash" style="padding: 0 5px;"></i>
          </button>
        </form>
      </div>
    </li>
    @endforeach
  </ul>
  @endisset

</div>
@endsection