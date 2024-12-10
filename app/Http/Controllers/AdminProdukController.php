<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Satuan;
use RealRashid\SweetAlert\Facades\Alert;

class AdminProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Checkout';
        $barangs = Barang::all();

        confirmDelete();

        return view('admin.produk.index', [
            'pageTitle' => $pageTitle,
            'barang' => $barangs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Order';
        $satuans = Satuan::all();
        return view('admin.produk.create', compact('pageTitle', 'satuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // Validasi input
    $validator = Validator::make($request->all(), [
        'kode' => 'required|unique:barangs,Kode_Barang',
        'nama' => 'required',
        'harga' => 'required|numeric',
        'deskripsi' => 'required',
        'satuan_id' => 'required',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
    ]);


    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Proses unggah gambar
    $gambar = $request->file('gambar');
    $nama_file = time().'.'.$gambar->getClientOriginalExtension();
    $gambar->move(public_path('images'), $nama_file);

    // Simpan data barang beserta nama file gambar
    $barang = new Barang;
    $barang->Kode_Barang = $request->kode;
    $barang->Nama_Barang = $request->nama;
    $barang->Harga_Barang = $request->harga;
    $barang->Deskripsi_Barang = $request->deskripsi;
    $barang->satuan_id = $request->satuan_id;
    $barang->gambar = 'images/'.$nama_file; // Simpan path gambar ke database
    $barang->save();

    Alert::success('Added Successfully', 'Item Added Successfully.');
    return redirect()->route('adminproduk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Show';
        $barang = Barang::findOrFail($id); // Gunakan findOrFail untuk menangani jika barang tidak ditemukan
        return view('admin.produk.show', compact('pageTitle', 'barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Edit Order';
        $satuans = Satuan::all();
        $barang = Barang::find($id);
        return view('admin.produk.edit', compact('pageTitle', 'satuans', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
            $nama_file = time().'.'.$gambar->getClientOriginalExtension();
            $gambar->move(public_path('images'), $nama_file);
            $barang->gambar = 'images/'.$nama_file; // Simpan path gambar baru ke database
        }

        $barang->save();


        Alert::success('Changed Successfully', 'Item Changed
        Successfully.');
        return redirect()->route('adminproduk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);

        // Hapus gambar jika ada
        if ($barang->gambar && file_exists(public_path($barang->gambar))) {
            unlink(public_path($barang->gambar));
        }

        $barang->delete();
        Alert::success('Deleted Successfully', 'Item Deleted Successfully.');
        return redirect()->route('adminproduk.index');
    }
}
