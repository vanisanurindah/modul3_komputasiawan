<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Satuan;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory // Ubah menjadi ItemFactory
{
    protected $model = Item::class;

    public function definition(): array
    {
        return [
            'itemcode' => $this->faker->unique()->word,
            'itemname' => $this->faker->word,
            'itemprice' => $this->faker->numberBetween(50000, 500000),
            'itemdesc' => $this->faker->sentence,
            'itempict' => $this->faker->imageUrl(200, 300),
            'satuan_id' => Satuan::factory(),
        ];
    }
}
