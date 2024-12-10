<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // Tambahkan atribut yang bisa diisi, jika diperlukan
    protected $fillable = ['itemcode', 'itemname', 'itemprice', 'itemdesc', 'itempict', 'satuan_id'];
}
