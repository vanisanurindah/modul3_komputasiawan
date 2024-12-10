@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">STRUK PEMBELIAN</h2>
    <p class="text-center">Order Summary</p>
    <p class="text-center">{{ now()->format('l, F j, Y') }}</p>

    <div class="receipt">
        @foreach($pembelians as $pembelian)
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">Pesanan #{{ $loop->iteration }}</h3>
                    <p class="card-text">QTY: {{ $pembelian->jumlah_produk }}</p>
                    <p class="card-text">ITEM: {{ $pembelian->nama_barang }}</p>
                    <p class="card-text">HARGA: Rp {{ number_format($pembelian->harga_barang, 2, ',', '.') }}</p>
                </div>
            </div>
        @endforeach

        <div class="total">
            <p>Total Item: {{ $totalItems }}</p>
            <p>Total Jumlah: Rp {{ number_format($totalAmount, 2, ',', '.') }}</p>
        </div>

        <p class="thank-you text-center">Terima kasih!</p>
    </div>

    <style>
        .btn-group {
            display: flex;
            justify-content: space-between; /* Mengatur tombol dengan jarak antar tombol */
            margin-top: 20px; /* Jarak atas tombol */
        }

        .btn {
            min-width: 150px; /* Mengatur lebar tombol agar seragam */
            margin: 0 10px; /* Menambahkan margin horizontal untuk jarak antar tombol */
        }

        .btn-primary {
            background-color: #e0a800ff; /* Warna biru Bootstrap */
            border-color: #007bff;
            color: #fff; /* Teks putih */
        }

        .btn-danger {
            background-color: #dc3545; /* Warna merah Bootstrap */
            border-color: #dc3545;
            color: #fff; /* Teks putih */
        }

        .btn-black {
            background-color: #000; /* Warna hitam */
            border-color: #000;
            color: #fff; /* Teks putih */
        }

        .btn-primary:hover {
            background-color: #000000; /* Warna biru gelap saat hover */
            border-color: #000000;
        }

        .btn-danger:hover {
            background-color: #c82333; /* Warna merah gelap saat hover */
            border-color: #c82333;
        }

        .btn-black:hover {
            background-color: #333; /* Warna hitam gelap saat hover */
            border-color: #333;
        }
    </style>

   <div class="btn-group">
    <a href="{{ route('katalog') }}" class="btn btn-primary">Tambah Order</a>
    @if($pembelians->isNotEmpty())
        <form action="{{ route('order.cancel', ['id' => 'all']) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Batalkan Semua Order</button>
        </form>
    @else
        <p>Anda belum memiliki pesanan</p>
    @endif
    <a href="{{ url()->previous() }}" class="btn btn-black">Kembali</a>
</div>
</div>
@endsection
