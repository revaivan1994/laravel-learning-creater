@extends('layouts.app')

@section('content')
    <h1>Tasks</h1>

    <ul>
        @foreach ($tasks as $task)
            <li>
                <strong>{{ $task->title }}</strong><br>
                {{ $task->description }}<br>
                Status: {{ $task->is_done ? '✅ Done!' : '❌ Not Done!' }}
            </li>
        @endforeach
    </ul>
    <button><a href="{{ route('tasks.create') }}">➕ Add task</a></button>
    <button><a href="{{ route('tasks.edit', $task) }}">Edit task</a></button>


@endsection