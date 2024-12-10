<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id', // Pastikan product_id ada di tabel pembelians
        'nama_profile',
        'nama_barang',
        'jumlah_produk',
        'harga_barang',
        'total_harga',
        'alamat',
        'metode_pembayaran',
    ];

    // Relasi dengan User (Satu Pembelian milik satu User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Product (Satu Pembelian berhubungan dengan satu Product)
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
