@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Form Pembelian</h2>
    <form action="{{ route('checkout.store') }}" method="POST" class="form-horizontal">
        @csrf
        <!-- Profile Section -->
        <div class="form-group row">
            <label for="profile_name" class="col-sm-3 col-form-label">Nama Profile</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="profile_name" name="profile_name" value="{{ Auth::user()->name }}" readonly>
            </div>
        </div>

        <!-- Hidden Product ID -->
        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <!-- Product Details Section -->
        <div class="form-group row">
            <label for="product_name" class="col-sm-3 col-form-label">Nama Barang</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->Nama_Barang }}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="product_price" class="col-sm-3 col-form-label">Harga Barang</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="product_price" name="product_price" value="Rp {{ number_format($product->Harga_Barang, 0, ',', '.') }}" readonly>
            </div>
        </div>

        <!-- Quantity Section -->
        <div class="form-group row">
            <label for="quantity" class="col-sm-3 col-form-label">Jumlah Produk</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" required>
            </div>
        </div>

        <!-- Total Price (Hidden Field) -->
        <input type="hidden" id="total_price" name="total_price" value="{{ $product->Harga_Barang }}">

        <!-- Address Section -->
        <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
        </div>

        <!-- Payment Method Section -->
        <div class="form-group row">
            <label for="payment_method" class="col-sm-3 col-form-label">Metode Pembayaran</label>
            <div class="col-sm-9">
                <select class="form-control" id="payment_method" name="payment_method" required>
                    <option value="transfer_bank">Transfer Bank</option>
                    <option value="kartu_kredit">Kartu Kredit</option>
                    <option value="cod">Cash on Delivery (COD)</option>
                </select>
            </div>
        </div>
        <div class="form-group row mt-4">
            <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary btn-lg">Beli Sekarang</button>
            </div>
        </div>
    </form>
</div>

<script>
    // Update total price when quantity changes
    document.getElementById('quantity').addEventListener('input', function() {
        var quantity = this.value;
        var price = {{ $product->Harga_Barang }};
        var totalPrice = quantity * price;
        document.getElementById('total_price').value = totalPrice;
    });
</script>

@endsection
