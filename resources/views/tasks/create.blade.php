<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Added Task</title>
</head>
<body>
    <h1>Create task</h1>


    @if ($errors->any())
        <div>
            <ul style="color: red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label> Name:
            <input type="text" name="title" required>
        </label><br><br>
        <label>Description:
            <textarea type="text" name="description"></textarea>
        </label><br><br>

        <button type="submit">Add</button>
    </form>

    <a href="{{ url('/') }}">Back to tasks</a>
</body>
</html>