<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title')
    </title>
</head>
<body>
@if(\Illuminate\Support\Facades\Auth::user())
    <p>Logged in as: {{ \Illuminate\Support\Facades\Auth::user()->email }}</p>
@endif

@yield('body')
</body>
</html>
