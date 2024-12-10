@extends('layouts.appadmin')
@section('content')
    <div id="wrapper">
        @include('layouts.navadmin')
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                @include('layouts.navtopadmin')
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
                    </div>
                    <div class="row">
                        <!-- Jumlah Pengguna Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body custom-card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Pengguna</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahPengguna }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Jumlah Produk Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body custom-card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah Produk</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahProduk }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Jumlah Transaksi Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body custom-card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah Transaksi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahTransaksi }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Pendapatan Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body custom-card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Pendapatan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ number_format($totalPendapatan, 0, ',', '.') }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-currency-exchange"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Chart Penjualan</h6>
                                        </div>
                                        <div class="card-body">
                                            <div id="chart">
                                                {!! $transaksiChart->container() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script src="{{ $transaksiChart->cdn() }}"></script>
                        {{ $transaksiChart->script() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .custom-card-body {
        padding-left: 10px;
        padding-right: 10px;
    }

    i {
        margin-right: 10px;
    }
</style>
