<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? 'Your Page Title' }}</title>

    <!-- Include CSS files -->
    @vite('resources/css/app.css')
    @vite('resources/css/bundle.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
</head>
<body>
    <!-- Include navbar -->
    @include('layouts.nav')

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Include JavaScript files -->
    @vite('resources/js/app.js')
    @vite('resources/js/bundle.js')
    @include('sweetalert::alert')
    @stack('scripts')
</body>
</html>
