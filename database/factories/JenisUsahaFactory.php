<?php

namespace Database\Factories;

use App\Models\JenisUsaha;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class JenisUsahaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = JenisUsaha::class;
    public function definition()
    {
        return [
            "nama"=>$this->faker->words(2, true),
        ];
    }
}
