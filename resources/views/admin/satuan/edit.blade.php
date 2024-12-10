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
                <form action="{{ route('adminsatuan.update', ['adminsatuan' => $satuan->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-center">
                        <div class="p-5 bg-light rounded-3 border col-xl-6">
                            <div class="mb-3 text-center">
                                <i class="bi bi-bag-check fs-1"></i>
                                <h4>Edit Satuan</h4>
                            </div>
                            <div class="mb-3">
                                <label for="kode" class="form-label">Kode Satuan</label>
                                <input class="form-control @error('kode') is-invalid @enderror" type="text" id="kode" name="kode" value="{{ old('kode', $satuan->Kode_Satuan) }}">
                                @error('kode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Satuan</label>
                                <input class="form-control @error('nama') is-invalid @enderror" type="text" id="nama" name="nama" value="{{ old('nama', $satuan->Nama_Satuan) }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6 d-grid">
                                    <a href="{{ route('adminsatuan.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                                </div>
                                <div class="col-md-6 d-grid">
                                    <button type="submit" class="btn btn-warning btn-lg mt-3"><i class="bi-check-circle me-2"></i> Edit</button>
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
