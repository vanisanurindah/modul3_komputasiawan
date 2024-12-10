@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    .custom-background {
        background-image: url('https://cdn0-production-images-kly.akamaized.net/2qetjl1N-Dujir0nY3MlkxY1Wwo=/1200x675/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3033787/original/095111500_1580130643-linen-542866_1920.jpg');
        background-size: cover;
        background-position: center;
        min-height: 100vh;
        padding: 40px 0;
    }
    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        height: 100%;
    }
    #gambarkatalog {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 5px;
    }
    .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    #deskripsi {
        margin-top: 10px;
        color: #666;
    }
    .cardbutton {
        width: 100%;
        background-color: rgb(255, 153, 0);
        color: #fff;
    }
    .cardbutton:hover {
        background-color: rgb(180, 99, 0);
        color: #fff;
    }
</style>

<div class="custom-background">
    <div class="container mt-4">
        <hr>
        <div class="row g-3">
            @foreach ($barang as $barang)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset($barang->gambar) }}" class="card-img-top" id="gambarkatalog" alt="Gambar Barang">
                    <div class="card-body">
                        <h5 class="card-title">{{ $barang->Nama_Barang }}</h5>
                        <p class="card-text">Rp {{ $barang->Harga_Barang }} /{{ $barang->satuan?->Nama_Satuan ?? 'Satuan Tidak Ditemukan' }}</p>
                        <p class="card-text" id="deskripsi">{{ $barang->Deskripsi_Barang }}</p>
                        <a href="{{ route('checkout.show', ['id' => $barang->id]) }}" class="btn cardbutton">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
