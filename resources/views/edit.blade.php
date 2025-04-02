@extends('layout')
@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg flex flex-col  items-center h-screen w-full">
    <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">Task Manager</h2>

    @if (session()->has('message'))
        <div x-data="{show: true}" x-init="setTimeout(()=> show = false, 3000)" x-show="show">
            <p class="text-green-800 mb-3 rounded text-sm">{{session('message')}}</p>
        </div>
    @endif
    <form method="POST" action="{{ route('task.update', ['task' => $task->id])}}" enctype="multipart/form-data" class="flex gap-2 mb-4 w-xl">
        @csrf
        @method('PUT')
        <input id="taskInput" type="text" placeholder="Enter a task..." value="{{$task->taskname}}" class="border p-2 flex-1 rounded" name="task">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer text-sm">Edit</button>
    </form>
    <div class="mt-6 flex justify-between items-center w-xl text-sm">
        <div class="flex-1 text-sm">
            {{ $tasks->links() }} <!-- Pagination Links -->
        </div>
    </div>
</div>
@endsection
