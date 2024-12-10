@extends('layouts.appadmin')
@section('content')
    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#ProductTable').DataTable();

                $('#sidebarToggleTop').on('click', function() {
                    setTimeout(function() {
                        table.columns.adjust().draw();
                    }, 300); // Sesuaikan waktu penundaan sesuai kebutuhan

                    // Set lebar tabel kembali saat sidebar ditutup
                    var sidebarWidth = $('#accordionSidebar').width();
                    if (sidebarWidth === 0) {
                        table.columns.adjust().draw();
                    }
                });
            });
        </script>
    @endpush
    <style>
        .detail-container {
            background-image: url('https://cdn0-production-images-kly.akamaized.net/2qetjl1N-Dujir0nY3MlkxY1Wwo=/1200x675/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3033787/original/095111500_1580130643-linen-542866_1920.jpg'); /* Path gambar background */
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .detail-card {
            background-color: rgba(255, 255, 255, 0.9); /* Sedikit transparan */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        .detail-card img {
            max-width: 100%;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .detail-card h4, .detail-card h5 {
            color: #333;
        }
        .detail-card hr {
            border-top: 2px solid rgba(189, 125, 6, 0.493);
        }
        .detail-card .btn {
            background-color: rgba(189, 125, 6, 0.493);
            border: none;
        }
        .detail-card .btn:hover {
            background-color: rgba(161, 100, 7, 0.853);
        }
    </style>

    <div id="wrapper">
        @include('layouts.navadmin')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto"></ul>
                </nav>
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="p-5 bg-light rounded-3 border col-xl-6 detail-card">
                            <div class="mb-3">
                                <i class="bi bi-card-list fs-1"></i>
                                <h4>Detail Produk</h4>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="gambar" class="form-label">Gambar Barang</label>
                                    @if ($barang->gambar)
                                        <img src="{{ asset($barang->gambar) }}" alt="Gambar Barang" class="img-fluid">
                                    @else
                                        <p>Tidak ada gambar</p>
                                    @endif
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="kode" class="form-label">Kode Barang</label>
                                    <h5>{{ $barang->Kode_Barang }}</h5>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="nama" class="form-label">Nama Barang</label>
                                    <h5>{{ $barang->Nama_Barang }}</h5>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="harga" class="form-label">Harga Barang</label>
                                    <h5>{{ $barang->Harga_Barang }}</h5>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi Baju</label>
                                    <pre>{{ $barang->Deskripsi_Barang }}</pre>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="satuan" class="form-label">Ukuran Baju</label>
                                    <h5>{{ $barang->satuan->Nama_Satuan }}</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 d-grid">
                                    <a href="{{ route('adminproduk.index') }}" class="btn btn-warning btn-lg mt-3">
                                        <i class="bi-arrow-left-circle me-2"></i> Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
