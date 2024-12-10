<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function index()
{
    // Mendapatkan semua pembelian terkait user yang sedang login
    $pembelians = Pembelian::where('user_id', Auth::id())->get();

    // Hitung total item dan total harga
    $totalItems = $pembelians->sum('jumlah_produk');
    $totalAmount = $pembelians->sum('total_harga');

    // Kirim data ke view
    return view('receipt.index', compact('pembelians', 'totalItems', 'totalAmount'));
}
    public function cancelOrder($id)
    {
        if ($id === 'all') {
            Pembelian::where('user_id', Auth::id())->delete();
        } else {
            Pembelian::where('user_id', Auth::id())->where('id', $id)->delete();
        }

        return redirect()->route('checkout.view')->with('success', 'Order berhasil dibatalkan!');
    }

}

