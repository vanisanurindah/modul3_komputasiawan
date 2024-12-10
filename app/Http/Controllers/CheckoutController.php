<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Satuan;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CheckoutController extends Controller
{
    public function index()
    {
        $pageTitle = 'Checkout';
        $barangs = Barang::all();

        confirmDelete();

        return view('checkout.index', [
            'pageTitle' => $pageTitle,
            'barang' => $barangs
        ]);
    }

    public function create($product_id)
    {
        $pageTitle = 'Create Order';
        $satuans = Satuan::all();
        $product = Barang::findOrFail($product_id);
        return view('checkout.create', compact('pageTitle', 'satuans', 'product'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'profile_name' => 'required|string|max:255',
            'product_id' => 'required|exists:barangs,id', // Pastikan mengacu ke tabel `barangs`
            'quantity' => 'required|integer|min:1',
            'address' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $product = Barang::findOrFail($validatedData['product_id']);

        // Hitung total harga berdasarkan jumlah produk
        $totalPrice = $product->Harga_Barang * $validatedData['quantity'];

        // Cek apakah total harga melebihi batas yang diperbolehkan
        if ($totalPrice > 9999999999) { // Misalnya batas harga maksimum adalah 10 milyar
            return back()->withErrors(['total_harga' => 'Total harga terlalu tinggi.'])->withInput();
        }

        // Simpan data ke tabel pembelians
        Pembelian::create([
            'user_id' => Auth::id(),
            'product_id' => $validatedData['product_id'], // Pastikan `product_id` disimpan
            'nama_profile' => $validatedData['profile_name'],
            'nama_barang' => $product->Nama_Barang,
            'jumlah_produk' => $validatedData['quantity'], // Simpan jumlah produk yang dibeli
            'harga_barang' => $product->Harga_Barang,
            'total_harga' => $totalPrice, // Simpan total harga
            'alamat' => $validatedData['address'],
            'metode_pembayaran' => $validatedData['payment_method'], // Simpan metode pembayaran
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('katalog')->with('success', 'Pembelian berhasil!');
    }

    public function show($id)
    {
        $pageTitle = 'Show';
        $barang = Barang::findOrFail($id); // Gunakan findOrFail untuk menangani jika barang tidak ditemukan
        return view('checkout.show', compact('pageTitle', 'barang'));
    }

    public function edit($id)
    {
        $pageTitle = 'Edit Order';
        $satuan = Satuan::all();
        $barang = Barang::find($id);
        return view('checkout.edit', compact('pageTitle', 'satuans', 'barang'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'kode.unique' => 'Kode barang sudah ada',
            'numeric' => 'Hanya bisa diisi dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'kode' => 'required|unique:barangs,Kode_Barang,' . $id,
            'nama' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'satuan_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar tidak wajib
        ], $messages);

        $validator->after(function ($validator) use ($request, $id) {
            $value = $request->input('kode');
            $count = DB::table('barangs')
                ->where('Kode_Barang', $value)
                ->where('id', '<>', $id)
                ->count();

            if ($count > 0) {
                $validator->errors()->add('kode', 'Kode Barang ini sudah dipakai.');
            }
        });

        Alert::success('Changed Successfully', 'Item Changed
Successfully.');

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $barang = Barang::find($id);
        $barang->Kode_Barang = $request->kode;
        $barang->Nama_Barang = $request->nama;
        $barang->Harga_Barang = $request->harga;
        $barang->Deskripsi_Barang = $request->deskripsi;
        $barang->satuan_id = $request->satuan_id;

        // Proses unggah gambar baru jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($barang->gambar && file_exists(public_path($barang->gambar))) {
                unlink(public_path($barang->gambar));
            }

            $gambar = $request->file('gambar');
            $nama_file = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images'), $nama_file);
            $barang->gambar = 'images/' . $nama_file; // Simpan path gambar baru ke database
        }

        $barang->save();


        // Redirect dengan SweetAlert
        return redirect()->route('checkout.index')->with('success', 'Order berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        // Hapus gambar jika ada
        if ($barang->gambar && file_exists(public_path($barang->gambar))) {
            unlink(public_path($barang->gambar));
        }

        $barang->delete();

        Alert::success('Deleted Successfully', 'Item Deleted


        Successfully.');
        // Redirect dengan SweetAlert
        return redirect()->route('checkout.index')->with('success', 'Barang berhasil dihapus!');
    }

    public function viewOnly()
    {
        $pageTitle = 'View Orders';
        $barangs = Barang::all();

        return view('order.view', [
            'pageTitle' => $pageTitle,
            'barang' => $barangs
        ]);
    }

}
