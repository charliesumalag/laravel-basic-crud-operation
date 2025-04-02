@extends('layout')
@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg flex flex-col  items-center h-screen w-full">
    <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">Task Manager</h2>

    @if (session()->has('message'))
        <div x-data="{show: true}" x-init="setTimeout(()=> show = false, 3000)" x-show="show">
            <p class="text-green-800 mb-3 rounded text-sm">{{session('message')}}</p>
        </div>
    @endif
    <form method="POST" action="{{ route('task.store')}}" class="flex gap-2 mb-4 w-xl">
        @csrf
        <input id="taskInput" type="text" placeholder="Enter a task..." class="border p-2 flex-1 rounded" name="task">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer text-sm">Add</button>
    </form>

    <ul id="taskList" class="space-y-2 text-left w-xl">
        @foreach ($tasks as $task)
            <li class="bg-gray-100 p-2 rounded text-gray-600 mb-2 flex justify-between items-center ">
                <span class="flex-1">{{ $task->taskname }}</span>
                <div class="flex gap-2">
                    <a href="{{ route('task.edit', ['task' => $task->id]) }}" class="text-yellow-500 hover:text-yellow-700 cursor-pointer">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form method="POST" action="{{ route('task.destroy', ['task' => $task->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 cursor-pointer">
                            <i class="fas fa-trash cursor-pointer"></i>
                        </button>
                     </form>
                </div>
            </li>
        @endforeach
    </ul>
    <div class="mt-6 flex justify-between items-center w-xl text-sm">
        <div class="flex-1 text-sm">
            {{ $tasks->links() }} <!-- Pagination Links -->
        </div>
    </div>
</div>
@endsection
