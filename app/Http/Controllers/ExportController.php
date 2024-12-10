<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\BarangExport;
use App\Exports\PembelianExport;

class ExportController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new BarangExport, 'barang.xlsx');
    }

    public function exportPDF()
    {
        $barang = Barang::all();
        $pdf = Pdf::loadView('exports.barang', compact('barang'));
        return $pdf->download('barang.pdf');
    }

    public function exportPembelianPDF()
    {
        $pembelians = Pembelian::all();
        $pdf = Pdf::loadView('exports.pembelian', compact('pembelians'));
        return $pdf->download('pembelians.pdf');
    }

    public function exportPembelianExcel()
    {
        return Excel::download(new PembelianExport, 'pembelians.xlsx');
    }

}
