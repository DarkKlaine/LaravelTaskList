<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::query()
            ->where('user_id', auth()->id())
            ->get();

        return view('tasks/main', compact('tasks'));
    }

    public function add()
    {
        return view('tasks/add');
    }

    public function look(Task $task)
    {
        if (auth()->user()->id !== $task->user_id) {
            abort(404);
        }

        return view('tasks/look', compact('task'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'name' => 'required',
        ]);
        $task = new Task();
        $task->description = $request->description;
        $task->name = $request->name;


        $task->user_id = auth()->user()->id;

        $task->save();

        return redirect()->route('dashboard');
    }

    public function edit(Task $task)
    {
        if (auth()->user()->id == $task->user_id) {
            return view('tasks/edit', compact('task'));
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function update(Request $request, Task $task)
    {
        if ($request->has('delete')) {
            $task->delete();
        } else {
            $this->validate($request, [
                'description' => 'required',
                'name' => 'required',
            ]);
            $task->description = $request->description;
            $task->name = $request->name;

            $task->save();
        }

        return redirect()->route('dashboard');
    }
}
