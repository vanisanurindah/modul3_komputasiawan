<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Pendapatan;
use RealRashid\SweetAlert\Facades\Alert;
use App\Charts\TransaksiChart;


class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the admin dashboard.
     */
    public function index(TransaksiChart $chart)
    {
        $jumlahPengguna = User::count();
        $jumlahProduk = Barang::count();
        $jumlahTransaksi = Pembelian::count();
        $totalPendapatan = Pembelian::sum('total_harga');
        $transaksiChart = $chart->build();

        return view('admin.index', compact('jumlahPengguna', 'jumlahProduk', 'jumlahTransaksi', 'totalPendapatan','transaksiChart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

        Alert::success('Added Successfully', 'Item Added Successfully.');

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


        // Redirect dengan SweetAlert
        return redirect()->route('admin.index')->with('success', 'Barang berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
