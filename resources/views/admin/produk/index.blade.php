@extends('layouts.appadmin')
@section('content')
    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#ProductTable').DataTable();
                $(".datatable").on("click", ".btn-delete", function(e) {
                    e.preventDefault();

                    var form = $(this).closest("form");
                    var name = $(this).data("name");

                    Swal.fire({
                        title: "Yakin Ingin Menghapus Produk\n" + name + "?",
                        text: "Data Akan Terhapus",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "bg-primary",
                        confirmButtonText: "Yakin",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
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
                    <div class="d-flex justify-content-between">
                        <h1 class="h3 mb-4 text-gray-800">Kelola Produk</h1>
                        <div>
                            <a href="{{ route('adminproduk.export.excel') }}" class="btn btn-success">Download Excel</a>
                            <a href="{{ route('adminproduk.export.pdf') }}" class="btn btn-danger">Download PDF</a>
                            <a href="{{ route('adminproduk.create') }}" class="btn btn-primary">Tambah Barang</a>
                        </div>
                    </div>
                    <div class="justify-content-between rounded p-4 bg-light">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped mb-0 datatable" id="ProductTable">
                                <thead>
                                    <tr>
                                        <th>Gambar Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Barang</th>
                                        <th>Deskripsi Barang</th>
                                        <th>Satuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $barang)
                                        <tr>
                                            <td><img src="{{ asset($barang->gambar) }}" alt="Gambar Barang"
                                                    style="max-width: 100px;"></td>
                                            <td>{{ $barang->Nama_Barang }}</td>
                                            <td>Rp {{ $barang->Harga_Barang }}</td>
                                            <td>{{ $barang->Deskripsi_Barang }}</td>
                                            <td>{{ $barang->satuan ? $barang->satuan->Nama_Satuan : 'Tidak ada satuan' }}</td>
                                            <td>
                                                <a href="{{ route('adminproduk.show', ['adminproduk' => $barang->id]) }}"
                                                    class="btn btn-outline-dark btn-sm me-2"><i
                                                        class="bi bi-eye-fill"></i></a>
                                                <a href="{{ route('adminproduk.edit', ['adminproduk' => $barang->id]) }}"
                                                    class="btn btn-outline-dark btn-sm me-2"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                                <form
                                                    action="{{ route('adminproduk.destroy', ['adminproduk' => $barang->id]) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-dark btn-sm btn-delete"><i
                                                            class="bi bi-trash-fill"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
