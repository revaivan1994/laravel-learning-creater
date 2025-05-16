<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>@yield('title', 'Tasks')</title>
</head>

<body class="p-4">
    <div class="container">
        <h1 class="mb-4">Tasks manager</h1>
        @yield('content')
    </div>


    @stack('scripts')
</body>

</html>