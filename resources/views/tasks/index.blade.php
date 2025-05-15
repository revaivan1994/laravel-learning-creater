<!-- resources/views/tasks/index.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task list</title>
</head>

<body>
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
</body>

</html>