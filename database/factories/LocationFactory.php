<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Location;

class LocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hospital' => $this->faker->hospital,
            'city' => $this->faker->city,
            'zip_code' => $this->faker->zip_code,
            'address' => $this->faker->address,
            'email' => $this->faker->email,
            'contact' => $this->faker->contact,
        ];
    }
}
