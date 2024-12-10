<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Jika nama tabel tidak mengikuti konvensi Laravel (misalnya, jika tabelnya bernama 'products')
    protected $table = 'products';

    // Jika kolom-kolom yang dapat diisi
    protected $fillable = ['name', 'price', 'description']; // Sesuaikan dengan kolom yang ada

    // Relasi dengan Pembelian (jika ada)
    public function pembelians()
    {
        return $this->hasMany(Pembelian::class);
    }
}
