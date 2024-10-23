<?php

namespace Database\Factories;

use App\Models\Mountain;
use Illuminate\Database\Eloquent\Factories\Factory;

class MountainFactory extends Factory
{
    protected $model = Mountain::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $continents = ['Afrika', 'Asia', 'Europe', 'America', 'Oceania'];
        
        return [
            'name' => $this->faker->word,
            'height' => $this->faker->numberBetween(500, 9000),
            'belongsToRange' => $this->faker->boolean,
            'firstClimbDate' => $this->faker->date(),
            'continent' => $this->faker->randomElement($continents),
        ];
    }
}
