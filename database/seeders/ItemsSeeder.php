<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item; // Pastikan Anda mengimpor model Item

class ItemsSeeder extends Seeder
{
    public function run()
    {
        // Memanggil factory pada model Item, bukan pada factory langsung
        Item::factory()->count(10)->create();  // Membuat 10 entri data Item
    }
}
