<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel Demo') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

        <!-- Site resouces -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Livewire -->
        @livewireStyles
    </head>
    <body class="container-fluid ">
        <div class="container">
            <header class="row mt-3 mb-2">
                <h2>Simple Laravel Demo</h2>
                <section>
                    @include('nav')
                </section>
            </header>

            <section class="global-message">
                @include('flash-message')
            </section>

            <section class="content">
               @yield('content')
            </section>
            <footer class="row mt-5">
                <p class="text-end">
                    Laravel v{{ app()->version() }} (PHP v{{ PHP_VERSION }})
                </p>
            </footer>
        </div>

        @livewireScripts
    </body>
</html>
