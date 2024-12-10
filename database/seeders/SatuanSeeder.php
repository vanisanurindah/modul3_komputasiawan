<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    // Menonaktifkan foreign key checks
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    // Truncate tabel
    DB::table('satuans')->truncate();

    // Mengaktifkan kembali foreign key checks
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    // Menambahkan data baru
    DB::table('satuans')->insert([
        [
            'Kode_Satuan'=> 'XL',
            'Nama_Satuan'=> 'Xtra Large',
        ],
        [
            'Kode_Satuan'=> 'L',
            'Nama_Satuan'=> 'Large',
        ],
        [
            'Kode_Satuan'=> 'S',
            'Nama_Satuan'=> 'Small',
        ],
    ]);
}

}


