@extends('layouts.app')

@section('content')
    <div class="container-sm mt-5">
        <form action="{{ route('checkout.update', ['checkout' => $barang->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <!-- Form Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="mb-3 text-center">
                        <i class="bi bi-bag-check fs-1"></i>
                        <h4>Edit Order</h4>
                    </div>
                    <div class="mb-3">
                        <label for="kode" class="form-label">Kode Barang</label>
                        <input class="form-control @error('kode') is-invalid @enderror" type="text" id="kode" name="kode" value="{{ old('kode', $barang->Kode_Barang) }}">
                        @error('kode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Add Input for Image -->
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Barang</label>
                        <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <!-- Show Current Image if exists -->
                        @if($barang->gambar)
                            <img src="{{ asset($barang->gambar) }}" alt="Current Image" class="img-thumbnail mt-2" style="max-width: 200px;">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Barang</label>
                        <input class="form-control @error('nama') is-invalid @enderror" type="text" id="nama" name="nama" value="{{ old('nama', $barang->Nama_Barang) }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Barang</label>
                        <input class="form-control @error('harga') is-invalid @enderror" type="text" id="harga" name="harga" value="{{ old('harga', $barang->Harga_Barang) }}">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Barang</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="5">{{ old('deskripsi', $barang->Deskripsi_Barang) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="satuan_id" class="form-label">Satuan Barang</label>
                        <select name="satuan_id" id="satuan_id" class="form-select @error('satuan_id') is-invalid @enderror">
                            @foreach ($satuans as $satuan)
                                <option value="{{ $satuan->id }}" {{ old('satuan_id', $barang->satuan_id) == $satuan->id ? 'selected' : '' }}>
                                    {{ $satuan->Kode_Satuan . ' - ' . $satuan->Nama_Satuan }}
                                </option>
                            @endforeach
                        </select>
                        @error('satuan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('checkout.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-warning btn-lg mt-3"><i class="bi-check-circle me-2"></i> Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
