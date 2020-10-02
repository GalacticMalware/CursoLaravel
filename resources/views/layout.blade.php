<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>@yield('title','Aprende')</title>
</head>
<body>

    <div id="app" class="d-flex flex-column h-screen justify-content-between">
    <header>
    @include('Complementos.nav')
   
   @include('parcials.session-status')
    </header>
    <main class="py-4">
    @yield('contenidos')
    </main>

    <footer class="bg-white text-center text-black-50 py-3 shadow">
        {{ config('app.name')}} | Copyright @ {{ date('y') }}
    </footer>
    </div>
</body>
</html>