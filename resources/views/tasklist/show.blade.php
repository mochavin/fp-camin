@extends('layouts.app')

@section('content')
<ul class="bg-white rounded-lg shadow-lg overflow-hidden p-4">
  <li class="border-b border-gray-200">
    <h1 class="font-bold text-lg px-6 py-4 bg-gray-100">{{ $taskList->tasklist_name }}</h1>
  </li>
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      @foreach ($tasks as $task)
      <tr>
        <td class="px-6 py-4 whitespace-nowrap">{{ $task['task_name'] }}</td>
        <td class="px-6 py-4 whitespace-nowrap">
          @if ($task['task_status'] === 'in_progress')
          doing
          @else
          {{ $task['task_status'] }}
          @endif
        </td>
        <td class="px-6 py-4 whitespace-nowrap flex">
          <a href="{{ route('task.edit', ['id' => $task['id']]) }}" class="mx-1 text-blue-500 hover:text-blue-700">
            <i class="fas fa-edit"></i>
          </a>
          <form action="{{ route('task.delete', ['id' => $task['id']]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="mx-1 text-red-500 hover:text-red-700">
              <i class="fas fa-trash"></i>
            </button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>


  <form action="{{ route('tasklist.add', ['id' => $taskList->id]) }}" method="POST" class="mt-4">
    @csrf
    <div class="flex items-center">
      <input type="text" name="task_name" placeholder="Enter task name" required class="flex-grow border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
      <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md">Add Task</button>
    </div>
  </form>
</ul>




@endsection