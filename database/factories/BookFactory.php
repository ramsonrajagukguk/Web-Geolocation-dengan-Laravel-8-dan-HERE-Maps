<?php

namespace Database\Factories;

use App\Models\Penulis;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomNum= rand(1,100);
        $cover ="https://picsum.photos/id/{$randomNum}/200/300";
        return [
            'penulis_id' => Penulis::inRandomOrder()->first()->id,
            'judul' => $this->faker->sentence(mt_rand(2,4)),
            'keterangan' => $this->faker->sentence(50),
            'jumlah' => rand(10,20),
            'cover' => $cover,
        ];
    }
}