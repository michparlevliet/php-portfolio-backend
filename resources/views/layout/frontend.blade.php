<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Portfolio | {{$title}}    </title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="{{url('app.css')}}">

    <script src="{{url('app.js')}}"></script>
    
</head>
<body>

<header class="w3-padding">

    <h1 class="w3-text-red">My Portfolio!</h1>

</header>

<hr>

@yield('content')

<hr>

<footer class="w3-padding">

    Footer Text | 
    Copyright {{date('Y')}}
    <a href="#">Facebook</a> | 
    <a href="#">Instagram</a>

    <br>

    @if (Auth::check())
        You are logged in as {{auth()->user()->first}} {{auth()->user()->last}} | 
        <a href="/console/logout">Log Out</a> | 
        <a href="/console/dashboard">Dashboard</a>
    @else
        <a href="/console/login">Login</a>
    @endif

</footer>

</body>
</html>