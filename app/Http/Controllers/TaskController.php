<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request)
    {
        Task::create($request->validated() + ['user_id' => Auth::id()]);
        return redirect()->route('tasks.index')->with('success', 'Task added');
    }

    public function show(Task $task)
    {
        $this->authorizeTask($task);
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $this->authorizeTask($task);
        return view('tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $this->authorizeTask($task);
        $task->update($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Task update');
    }

    public function destroy(Task $task)
    {
        $this->authorizeTask($task);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task delete');
    }

    protected function authorizeTask(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}

