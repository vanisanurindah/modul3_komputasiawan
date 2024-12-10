<?php

namespace App\Exports;

use App\Models\Pembelian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PembelianExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pembelian::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Kode Pembelian',
            'Nama Pembelian',
            'Jumlah',
            'Harga',
            'Tanggal',
            'Created At',
            'Updated At',
        ];
    }
}
