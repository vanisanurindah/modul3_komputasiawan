@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">STRUK PEMBELIAN</h2>
    <p class="text-center">Order Summary</p>

    <div class="receipt">
        @foreach($pembelians as $pembelian)
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">
                        Struk #{{ $loop->iteration }} - {{ $pembelian->created_at->format('l, F j, Y H:i') }}
                        <!-- Menampilkan waktu pesanan dibuat -->
                    </h3>
                    <p class="card-text">QTY: {{ $pembelian->jumlah_produk }}</p>
                    <p class="card-text">ITEM: {{ $pembelian->nama_barang }}</p>
                    <p class="card-text">HARGA: Rp {{ number_format($pembelian->harga_barang, 2, ',', '.') }}</p>
                    <p class="card-text">
                        Metode Pembayaran:
                        @if($pembelian->metode_pembayaran == 'transfer_bank')
                            Pembayaran melalui transfer bank
                        @else
                            {{ $pembelian->metode_pembayaran }}
                        @endif
                    </p>
                </div>
            </div>
        @endforeach

        <div class="total">
            <p>Total Item: {{ $totalItems }}</p>
            <p>Total Jumlah: Rp {{ number_format($totalAmount, 2, ',', '.') }}</p>
        </div>

        <p class="thank-you text-center">Terima kasih!</p>
    </div>

    <div class="btn-group">
        <a href="{{ route('katalog') }}" class="btn btn-primary">Tambah Order</a>
        @if($pembelians->isNotEmpty())
            <form id="cancel-order-form" action="{{ route('order.cancel', ['id' => 'all']) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="button" onclick="cancelOrder()" class="btn btn-danger">Batalkan Semua Order</button>
            </form>
        @else
            <p>Anda belum memiliki pesanan</p>
        @endif
        <a href="{{ url()->previous() }}" class="btn btn-black">Kembali</a>
    </div>
</div>

<script>
    function cancelOrder() {
        let form = document.getElementById('cancel-order-form'); // Ambil elemen form
        let url = form.action; // Ambil URL dari atribut action form

        fetch(url, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Kosongkan tampilan pesanan
                document.querySelector('.receipt').innerHTML = `
                    <p class="text-center text-muted">Anda belum memiliki pesanan</p>
                `;
                // Ubah tombol menjadi hanya untuk menambah pesanan
                document.querySelector('.btn-group').innerHTML = `
                    <a href="{{ route('katalog') }}" class="btn btn-primary">Tambah Order</a>
                    <a href="{{ url()->previous() }}" class="btn btn-black">Kembali</a>
                `;
            } else {
                alert('Terjadi kesalahan saat membatalkan pesanan.');
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>

<style>
    .btn-group {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .btn {
        min-width: 150px;
        margin: 0 10px;
    }

    .btn-primary {
        background-color: #e0a800ff;
        border-color: #007bff;
        color: #fff;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
        color: #fff;
    }

    .btn-black {
        background-color: #000;
        border-color: #000;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #000000;
        border-color: #000000;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #c82333;
    }

    .btn-black:hover {
        background-color: #333;
        border-color: #333;
    }
</style>
@endsection
