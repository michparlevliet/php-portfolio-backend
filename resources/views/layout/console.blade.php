<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Portfolio</title>

        <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
        <link rel="stylesheet" href="{{url('app.css')}}">
        <script src="https://kit.fontawesome.com/4aec9b7b34.js" crossorigin="anonymous"></script>
        <script src="{{url('app.js')}}"></script>
        
    </head>
    <body>

        <header class="w3-padding">

            <h1 class="w3-text-red">Portfolio Console</h1>
            <div class="menu">
                @if (Auth::check())
                    You are logged in as {{auth()->user()->first}} {{auth()->user()->last}} |
                    <a class="menu-link" href="/console/logout">Log Out <i class="fa-solid fa-right-from-bracket fa-xl"></i></a>  
                    <a class="menu-link" href="/console/dashboard">Dashboard <i class="fa-solid fa-grip fa-xl"></i> </a>  
                    <a class="menu-link" href="/">Home <i class="fa-solid fa-house fa-xl"></i></a>
                @else
                    <a href="/"><< Return to My Portfolio</a>
                @endif
            </div>

        </header>

        <hr>

        @if (session()->has('message'))
            <div class="w3-padding w3-margin-top w3-margin-bottom">
                <div class="w3-red w3-center w3-padding">{{session()->get('message')}}</div>
            </div>
        @endif

        @yield ('content')

    </body>
</html>