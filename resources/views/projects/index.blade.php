@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Project list</h1>

        @foreach ($projects as $project)
            <div class="card my-4">
                <div class="card-header">
                    <h3>{{ $project->name }}</h3>
                </div>
                <div class="card-body">
                    @if ($project->tasks->isNotEmpty())
                        <ul class="list-group list-group-flush">
                            @foreach ($project->tasks as $task)
                                <li class="list-group-item">{{ $task->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No Tasks!</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection