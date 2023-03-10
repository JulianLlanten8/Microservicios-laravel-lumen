<?php

namespace Database\Factories;

use App\Models\Cartera;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarteraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cartera::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'titulo' => $this->faker->title,
        ];
    }
}
