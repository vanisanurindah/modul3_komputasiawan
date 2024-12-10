<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index()
    {
        $pageTitle = 'Katalog';
        $barangs = Barang::all();

        return view('katalog', [
            'pageTitle' => $pageTitle,
            'barang' => $barangs // atau 'barangs' => $barangs jika Anda ingin akses sebagai $barangs di view
        ]);
    }
}
