@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $task->title }}</h1>
        <p>{{ $task->description }}</p>
        <p>Status: {{ $task->status }}</p>
        <a href="{{ route('tasks.index') }}" class="btn btn-primary">Back to Tasks</a>
        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-secondary">Edit Task</a>
        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Task</button>
        </form>
    </div>


@endsection