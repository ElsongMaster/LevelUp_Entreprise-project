<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TacheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "titre"=>$this->faker->text(5),
            "description"=>$this->faker->text(10),
            "status"=>$this->faker->randomElement($array = array ('done','open')),
            "entreprise_id"=>1,
        ];
    }
}
