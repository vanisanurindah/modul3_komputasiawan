<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- buat icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css"
        rel="stylesheet">
    @vite('resources/css/card.css')
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a href="{{ route('shop') }}" class="navbar-brand mb-0 h1">
                <img src="{{ Vite::asset('../resources/images/logo.jpg') }}" class="me-2" style="height: 24px;">
                fzshoopelovers
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <hr class="d-lg-none text-white-50">

                <ul class="navbar-nav flex-row flex-wrap">
                    <li class="nav-item col-6 col-md-auto"><a href="{{ route('shop') }}" class="nav-link">Beranda</a></li>
                    <li class="nav-item col-6 col-md-auto"><a href="{{ route('katalog') }}" class="nav-link">Katalog</a></li>
                    <li class="nav-item col-6 col-md-auto"><a href="{{ route('katalog') }}" class="nav-link">Pesanan Saya</a></li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="btn btn-primary me-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="btn btn-secondary" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else


                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item">{{ Auth::user()->email }}</a>
                                <hr class="m-0 p-0">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

                <hr class="d-lg-none text-white-50">
            </div>
        </div>
    </nav>

    <div class="card-owner">
        <div class="row g-0">
            <div class="col-md-4">
            </div>
            <div class="col-md-8">
            </div>
        </div>
    </div>

    {{-- new in  --}}
    <div class="text">
        <h2>NEW IN</h2>
    </div>
    <div class="card-container">
        <div class="card">
            <img src="{{ Vite::asset('../resources/images/beranda1.png') }}" alt="Product 1">
            <div class="card-body">
                <h5 class="card-title">Pencil Pleats Skirt ✨</h5>
            </div>
        </div>
        <div class="card">
            <img src="{{ Vite::asset('../resources/images/beranda4.png') }}" alt="Product 1">
            <div class="card-body">
                <h5 class="card-title">Mix and Match 💫</h5>
            </div>
        </div>
        <div class="card">
            <img src="{{ Vite::asset('../resources/images/beranda2.png') }}" alt="Product 1">
            <div class="card-body">
                <h5 class="card-title">Rachel Jeans🩵</h5>
            </div>
        </div>
        <div class="card">
            <img src="{{ Vite::asset('../resources/images/beranda3.png') }}" alt="Product 1">
            <div class="card-body">
                <h5 class="card-title">Blus Korea🎀</h5>
            </div>
        </div>

    </div>
    <div class="text">
        <h2>KATALOG</h2>
    </div>
    <div class="katalog">
        <!-- Katalog 1 -->
        <div class="katalog-item">
            <img src="{{ Vite::asset('../resources/images/beranda5.png') }}" alt="Product 1">
            <div class="katalog-content">
                <p>Zaq Kamari Set</p>

            </div>
        </div>
        <!-- Katalog 2 -->
        <div class="katalog-item">
            <img src="{{ Vite::asset('../resources/images/beranda6.png') }}" alt="Product 2">
            <div class="katalog-content">
                <p>Tizza Tunik </p>

            </div>
        </div>
        <!-- Katalog 3 -->
        <div class="katalog-item">
            <img src="{{ Vite::asset('../resources/images/beranda7.png') }}" alt="Product 3">
            <div class="katalog-content">
                <p>Azura Knitt</p>

            </div>
        </div>
        <!-- Katalog 4 -->
        <div class="katalog-item">
            <img src="{{ Vite::asset('../resources/images/beranda8.png') }}" alt="Product 4">
            <div class="katalog-content">
                <p>Emy Stripe</p>

            </div>
        </div>
        <!-- Katalog 5 -->
        <div class="katalog-item">
            <img src="{{ Vite::asset('../resources/images/beranda9.png') }}" alt="Product 5">
            <div class="katalog-content">
                <p>Zaq Kaffah Pasmina Instant</p>

            </div>
        </div>
        <!-- Katalog 6 -->
        <div class="katalog-item">
            <img src="{{ Vite::asset('../resources/images/beranda10.png') }}" alt="Product 6">
            <div class="katalog-content">
                <p>Korean Baggy Pants</p>

            </div>
        </div>
    </div>

    {{-- Promo --}}
    <div class="promo-box">
        <img src="{{ Vite::asset('../resources/images/akhir.png') }}" alt="Promo Image">
        <div class="promo-content">
            <h3>Our Instagram</h3>
            <p>@fzshoopelovers</p>

        </div>
    </div>

    @vite('resources/js/app.js')
</body>

</html>
