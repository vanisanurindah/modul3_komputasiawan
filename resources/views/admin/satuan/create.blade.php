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
                <form action="{{ route('adminsatuan.store') }}" method="POST" enctype="multipart/form-data"> <!-- tambahkan enctype="multipart/form-data" -->
                    @csrf
                    <div class="row justify-content-center">

                        <div class="p-5 bg-light rounded-3 border col-xl-6">
                            @if ($errors->any())
                            {{-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div> --}}
                            @endif

                            <div class="mb-3 text-center">
                                <i class="bi bi-cart-plus fs-1"></i>
                                <h4>Tambah Satuan</h4>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="kode" class="form-label">Kode Satuan</label>
                                    <input class="form-control @error('kode') is-invalid @enderror" type="text" name="kode"
                                        id="kode" value="{{ old('kode') }}" placeholder="Kode Barang Wajib diisi">
                                    @error('kode')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nama" class="form-label">Nama Satuan</label>
                                    <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama"
                                        id="nama" value="{{ old('nama') }}" placeholder="Nama Barang wajib diisi">
                                    @error('nama')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 d-grid">
                                    <a href="{{ route('adminsatuan.index') }}"
                                        class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i>
                                        Cancel</a>
                                </div>
                                <div class="col-md-6 d-grid">
                                    <button type="submit" class="btn btn-warning btn-lg mt-3"><i class="bi-check-circle me-2"></i>
                                        Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
