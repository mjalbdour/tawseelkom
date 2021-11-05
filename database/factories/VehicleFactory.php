<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'size' => $this->faker->randomElement(array_values(config('constants.vehicle_sizes'))),
            'price_in_amman' => $this->faker->randomFloat(3, 1, 9),
            'price_outside_amman' => $this->faker->randomFloat(3, 2, 9)
        ];
    }

    public function small()
    {
        return $this->state(function ($attributes) {
            $size = array_values(config('constants.vehicle_sizes'))[0];
            return [
                'size' => $size,
            ];
        });
    }

    public function medium()
    {
        return $this->state(function ($attributes) {
            $size = array_values(config('constants.vehicle_sizes'))[1];
            return [
                'size' => $size,
            ];
        });
    }

    public function large()
    {
        return $this->state(function ($attributes) {
            $size = array_values(config('constants.vehicle_sizes'))[2];
            return [
                'size' => $size,
            ];
        });
    }
}
