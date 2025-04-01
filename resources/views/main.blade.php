@extends('layout')
@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center h-screen w-full">
    <h2 class="text-2xl font-bold mb-4 text-center">Task Manager</h2>

    <div class="flex gap-2 mb-4 w-xl">
        <input id="taskInput" type="text" placeholder="Enter a task..." class="border p-2 flex-1 rounded">
        <button onclick="addTask()" class="bg-blue-500 text-white px-4 py-2 rounded">Add</button>
    </div>

    <ul id="taskList" class="space-y-2 text-left w-xl">
        @foreach ($tasks as $task)
            <li class="bg-gray-100 p-2 rounded mb-2 flex justify-between items-center">
                <span class="flex-1">{{ $task->taskname }}</span>
                <div class="flex gap-2">
                    <a class="text-yellow-500 hover:text-yellow-700 cursor-pointer">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form>
                        <button class="text-red-500 hover:text-red-700 cursor-pointer">
                            <i class="fas fa-trash"></i>
                        </button>
                     </form>
                </div>
            </li>
        @endforeach
    </ul>


</div>
@endsection
