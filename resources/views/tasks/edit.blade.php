@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Edit task</h1>

        <form action="{{ route('tasks.update', $task) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input 
                    type="text" 
                    name="title"
                    id="title"
                    class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $task->title) }}"
                    required
                >
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Desription:</label>
                <textarea 
                    name="description"
                    id="description"
                    class="form-control @error('description') is-invalid @enderror"
                    rows="4"
                    required
                
                    >{{ old('description', $task->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
@endsection