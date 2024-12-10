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
                <form action="{{ route('adminproduk.store') }}" method="POST" enctype="multipart/form-data"> <!-- tambahkan enctype="multipart/form-data" -->
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
                                <h4>Create Order</h4>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="kode" class="form-label">Kode Barang</label>
                                    <input class="form-control @error('kode') is-invalid @enderror" type="text" name="kode"
                                        id="kode" value="{{ old('kode') }}" placeholder="Kode Barang Wajib diisi">
                                    @error('kode')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nama" class="form-label">Nama Barang</label>
                                    <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama"
                                        id="nama" value="{{ old('nama') }}" placeholder="Nama Barang wajib diisi">
                                    @error('nama')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="harga" class="form-label">Harga Barang</label>
                                    <input class="form-control @error('harga') is-invalid @enderror" type="text" name="harga"
                                        id="harga" value="{{ old('harga') }}" placeholder="Harga Barang wajib diisi">
                                    @error('harga')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi Barang</label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="3" placeholder="Deskripsi Barang wajib diisi">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="gambar" class="form-label">Gambar Barang</label>
                                    <input class="form-control @error('gambar') is-invalid @enderror" type="file"
                                        name="gambar" id="gambar">
                                    @error('gambar')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="satuan" class="form-label">Satuan Barang</label>
                                    <select name="satuan_id" id="satuan" class="form-select">
                                        @foreach ($satuans as $satuan)
                                        <option value="{{ $satuan->id }}"
                                            {{ old('satuan_id') == $satuan->id ? 'selected' : '' }}>
                                            {{ $satuan->Kode_Satuan.' - '.$satuan->Nama_Satuan }}</option>
                                        @endforeach
                                    </select>
                                    @error('satuan_id')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>

                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 d-grid">
                                    <a href="{{ route('adminproduk.index') }}"
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
