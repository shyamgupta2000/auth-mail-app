<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard</h1>
    <p>
        @if (auth()->check())
        {{ Auth::user()->id }}, {{ Auth::user()->name }}, {{ Auth::user()->email }}        
        @endif
    </p>
    <a href="{{ route('logout') }}">Logout</a>
</body>
</html>