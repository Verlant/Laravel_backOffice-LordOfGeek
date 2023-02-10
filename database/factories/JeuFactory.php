<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jeu>
 */
class JeuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'titre' => $this->faker->unique()->words(3, true),
            'categorie_id' => 1,
            'tag_id' => 1
        ];
    }
}
