<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all();
        return view('task.index', compact('tasks'));
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:5',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('task.create')
                ->withErrors($validator)
                ->withInput();
        }

        $task = new Task();
        $task->name = $request->name;
        $task->save();

        return redirect()->route('task.index')->with('success', 'Task Created Successfully');
    }

    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:5',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('task.edit', $task->id)
                ->withErrors($validator)
                ->withInput();
        }

        $task->name = $request->input('name');
        $task->save();
        return redirect()->route('task.index')->with('success','Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index')->with('success','Task deleted successfully');
    }
}
