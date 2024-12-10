@php
    $currentRouteName = Route::currentRouteName();
@endphp
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ms-auto" style="margin-right: 100px">
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre style="color: black">
                {{ Auth::user()->name }}<i class="bi bi-chevron-down" style="margin-top: 5px; margin-left: 5px"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-down" aria-labelledby="navbarDropdown">
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
    </ul>
</nav>
