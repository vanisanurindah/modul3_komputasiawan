<?php

namespace Database\Factories;

use App\Models\Satuan;
use Illuminate\Database\Eloquent\Factories\Factory;

class satuanFactory extends Factory
{
    protected $model = Satuan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Kode_Satuan' => $this->faker->unique()->lexify('SAT-????'), // Menghasilkan kode satuan unik
            'nama_satuan' => $this->faker->word,                        // Nama satuan acak
        ];
    }
}


