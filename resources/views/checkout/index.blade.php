@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Product Image -->
        <div class="col-md-5">
            <div class="product-image">
                <img src="{{ asset($barang->gambar) }}" alt="Gambar Barang" class="img-fluid">
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-7">
            <div class="product-details">
                <h2 class="product-title">{{ $barang->Nama_Barang }}</h2>
                <p class="product-price">Rp {{ number_format($barang->Harga_Barang, 0, ',', '.') }}</p>
                <p class="product-description">{{ $barang->Deskripsi_Barang }}</p>

                <div class="product-meta">
                    <span class="product-satuan">Satuan: {{ $barang->satuan->Nama_Satuan }}</span>
                </div>

                <!-- Checkout Button -->
                <div class="mt-4">
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .product-image img {
        border-radius: 8px;
    }
    .product-details {
        padding-left: 20px;
    }
    .product-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .product-price {
        font-size: 22px;
        color: #ff5722;
        margin-bottom: 15px;
    }
    .product-description {
        font-size: 16px;
        color: #757575;
        margin-bottom: 20px;
    }
    .product-meta {
        font-size: 14px;
        color: #757575;
        margin-bottom: 20px;
    }
</style>
@endsection
