<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdminSatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Checkout';
        $satuans = Satuan::all();

        confirmDelete();

        return view('admin.satuan.index', [
            'pageTitle' => $pageTitle,
            'satuan' => $satuans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Order';
        return view('admin.satuan.create', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|unique:satuans,Kode_Satuan',
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan data barang beserta nama file gambar
        $satuan = new Satuan();
        $satuan->Kode_Satuan = $request->kode;
        $satuan->Nama_Satuan = $request->nama;
        $satuan->save();

        Alert::success('Added Successfully', 'Item Added Successfully.');
        return redirect()->route('adminsatuan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Show';
        $satuan = Satuan::findOrFail($id); // Gunakan findOrFail untuk menangani jika barang tidak ditemukan
        return view('admin.satuan.show', compact('pageTitle', 'satuan'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Edit Order';
        $satuan = Satuan::find($id);
        return view('admin.satuan.edit', compact('pageTitle', 'satuan'));
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
            'kode' => 'required|unique:satuans,Kode_Satuan,' . $id,
            'nama' => 'required',
        ], $messages);

        $validator->after(function ($validator) use ($request, $id) {
            $value = $request->input('kode');
            $count = DB::table('satuans')
                ->where('Kode_Satuan', $value)
                ->where('id', '<>', $id)
                ->count();

            if ($count > 0) {
                $validator->errors()->add('kode', 'Kode Satuan ini sudah dipakai.');
            }
        });


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $satuan = Satuan::find($id);
        $satuan->Kode_Satuan = $request->kode;
        $satuan->Nama_Satuan = $request->nama;
        $satuan->save();

        Alert::success('Changed Successfully', 'Item Changed Successfully.');
        return redirect()->route('adminsatuan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
