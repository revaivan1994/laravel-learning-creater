@extends('layouts.app')

@section('content')
    <h1 class="mb-4">My Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create Task</a>
    <table class="table table-bordered border-primary">
        <thead class="table-primary">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td class="table-success">{{ $task->title }}</td>
                    <td>{{ $task->description ?? 'No description' }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-primary">Show</a>
                        @auth
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        @endauth
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection