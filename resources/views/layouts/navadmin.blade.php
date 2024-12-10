@php
    $currentRouteName = Route::currentRouteName();
@endphp
<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="bi bi-bag-heart-fill fs-4"></i>
        </div>
        <div class="sidebar-brand-text mx-0">fzshoopelovers</div>
    </a>
    <hr class="sidebar-divider my-0" style="color: white">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('adminsatuan.index') }}">
            <i class="bi bi-box"></i>
            <span>Manajemen Satuan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('adminproduk.index') }}">
            <i class="bi bi-boxes"></i>
            <span>Manajemen Barang</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admintransaksi.index') }}">
            <i class="bi bi-currency-dollar"></i>
            <span>Manajemen Transaksi</span></a>
    </li>
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

