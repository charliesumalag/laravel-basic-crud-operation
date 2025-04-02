<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{

    public function index()
    {

        return view('main', [
            'tasks' => Task::latest()->paginate(10),
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'task' => 'required',
        ]);

        Task::create(['taskname' => $validated['task']]);
        return redirect('/')->with('message', 'Task added successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/')->with('message', 'Task deleted successfully');
    }

    public function edit(Task $task)
    {
        return view('edit', [
            'task' => $task,
            'tasks' => Task::latest()->paginate(10)
        ]);
    }

    public function update(Request $request, Task $task)
    {

        $validated = $request->validate([
            'task' => 'required',
        ]);

        $task->update(['taskname' => $validated['task']]);
        return redirect('/')->with('message', 'Task updated successfully');
    }
}
