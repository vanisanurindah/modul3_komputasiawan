@php
    $currentRouteName = Route::currentRouteName();
@endphp
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
                <li class="nav-item col-6 col-md-auto">
                    <a href="{{ route('shop') }}" class="nav-link {{ $currentRouteName === 'shop' ? 'active' : '' }}">Beranda</a>
                </li>
                <li class="nav-item col-6 col-md-auto">
                    <a href="{{ route('katalog') }}" class="nav-link {{ $currentRouteName === 'katalog' ? 'active' : '' }}">Katalog</a>
                </li>

                <!-- Ganti "Cetak Struk" dengan "Pesanan Saya" -->
                @auth
                    <li class="nav-item col-6 col-md-auto">
                        <a href="{{ route('receipt.index') }}" class="nav-link {{ $currentRouteName === 'receipt.index' ? 'active' : '' }}">Pesanan Saya</a>
                    </li>
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
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
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
