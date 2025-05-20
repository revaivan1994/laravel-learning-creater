<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use App\Models\Project;
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
        $categories = Category::where('user_id', Auth::id())->get();
        return view('tasks.create', compact('categories'));
    }

    public function store(TaskRequest $request, Project $project)
    {
        Task::create($request->validated() + ['user_id' => Auth::id()]);
        $validated = $request->validated([
            'name' => 'required|string|max:255',
        ]);
        $project->tasks()->create($validated);
        return redirect()->route('projects.index')->with('success', 'Task added');

    }

    public function show(Task $task)
    {
        $this->authorizeTask($task);
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $this->authorizeTask($task);
        $categories = Category::where('user_id', Auth::id())->get(); 
        return view('tasks.edit', compact('task', 'categories'));
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
        // $task->user_id !== Auth::id()
        if (!auth()->check()) {
            abort(403, 'Unauthorized action.');
        }
    }

    public function publicIndex(Request $request)
    {
        $query = Task::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->server . '%');
        }

        $tasks = $query->get();
        $categories = Category::all();

        return view('tasks.index', compact('tasks', 'categories'));
    }
}

