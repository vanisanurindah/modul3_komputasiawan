<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/fontawesome/css/all.css') }}">

    {{-- JavaScript Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    {{-- <title>{{ $pageTitle }}</title> --}}
    @vite('resources/css/app.css')
    <!-- Include Bootstrap CSS -->
    @vite('resources/css/admin.css')
    @vite(['/resources/css/dataTables.bootstrap5.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <!-- Include Bootstrap Icons CDN -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
        <script>
            document.addEventListener("DOMContentLoaded", function() {
              const sidebarToggle = document.getElementById('sidebarToggle');
              const sidebar = document.getElementById('accordionSidebar');

              sidebarToggle.addEventListener('click', function() {
                if (sidebar.classList.contains('toggled')) {
                  sidebar.classList.remove('toggled');
                } else {
                  sidebar.classList.add('toggled');
                }
              });
            });
          </script>

</head>

<body>
    @yield('content')
    @vite('resources/js/app.js')
    @include('sweetalert::alert')
    @stack('scripts')
    {{-- <!-- Include Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script> --}}
</body>

</html>
