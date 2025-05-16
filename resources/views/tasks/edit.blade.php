@extends('layouts.app')

@section('content')
    <h1>Edit task</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ old('title', $task->title) }}">
        <button type="submit">Save</button>
    </form>

@endsection