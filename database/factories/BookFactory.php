<?php

namespace Database\Factories;

use App\Models\Author;
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
        $cover ="buku/home-decor-1.jpg";
        return [
            'author_id' => Author::inRandomOrder()->first()->id,
            'judul' => $this->faker->sentence(mt_rand(2,4)),
            'keterangan' => $this->faker->sentence(50),
            'jumlah' => rand(10,20),
            'cover' => $cover,
        ];
    }
}
