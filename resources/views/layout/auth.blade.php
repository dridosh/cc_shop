<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', env('APP_NAME'))</title>
        @vite(['resources/css/app.css', 'resources/sass/main.sass'])
        {{--        ,'resources/js/app.js'--}}
    </head>
    <body class="antialiased">
        @if(session()->has('message'))
            {{ session('message')  }}
        @endif

        <main class="md:min-h-screen md:flex md:items-center md:justify-center py-16 lg:py-10">
            <div class="container">
                <div class="text-center">
                    <a href="{{ route('home') }}" class="inline-block" rel="home">
                        <img src="{{ Vite::image('logo.png') }}" class="w-[48px] md:w-[200px] h-[236px] md:h-[200px]"
                             alt="Окна Для Вас">

                    </a>
                </div>

                @yield('content')
            </div>
        </main>

    </body>
</html>

