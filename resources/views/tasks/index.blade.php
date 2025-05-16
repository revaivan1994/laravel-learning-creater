@extends('layouts.app')

@section('content')
    <h1>Tasks</h1>

    <ul>
        @foreach ($tasks as $task)
            <li>
                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                <strong>{{ $task->title }}</strong><br>
                {{ $task->description }}<br>
                Status: {{ $task->is_done ? '✅ Done!' : '❌ Not Done!' }}
                <button class="btn btn-outline-primary btn-sm"><a href="{{ route('tasks.edit', $task) }}">Edit task</a></button>
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete task?)" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
    <button type="button" class="btn btn-outline-primary"><a href="{{ route('tasks.create') }}">➕ Add task</a></button>
    <button type="button" class="btn btn-outline-primary"><a href="{{ route('tasks.edit', $task) }}">Edit task</a></button>


@endsection