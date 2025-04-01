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
}
