@extends('layouts.app')

@section('content')
<ul class="bg-white rounded-lg shadow-lg p-4 flex flex-col min-w-[200px] mx-auto w-fit">
  <li class="border-b border-gray-100 bg-gray-100  flex items-center justify-between">
    <h1 class="font-bold text-lg px-6 py-4">{{ $taskList->tasklist_name }}</h1>
    <form action="{{ route('tasklist.destroy', ['id' => $taskList->id]) }}" method="POST" class="flex items-center px-6">
      @csrf
      @method('DELETE')
      <button type="submit" class="text-red-500 hover:text-red-700 flex items-center gap-2 font-semibold" onclick="return confirm('Are you sure you want to delete all tasks?')">
        <p>Delete All</p>
        <i class="fas fa-trash"></i>
      </button>
    </form>
  </li>
  <table class="min-w-full divide-y divide-gray-200">
    <tbody class="bg-white divide-y divide-gray-200">
      @foreach ($tasks as $status => $tasksGroup)
      <tr>
        <td colspan="2" class="px-6 py-1 whitespace-nowrap font-bold bg-gray-200">
          @if ($status === 'in_progress')
          doing
          @else
          {{ $status }}
          @endif
        </td>
      </tr>
      @foreach ($tasksGroup as $task)
      <tr class="hover:bg-gray-100 flex justify-between ">
        <td class="px-6 py-1  text-wrap">{{ $task['task_name'] }}</td>
        <td class="px-6 py-1 whitespace-nowrap flex">
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