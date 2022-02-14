<?php

namespace Database\Factories;

use App\Models\Company;
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
        $this->faker->addProvider(new \Faker\Provider\Fakecar($this->faker));
        return [
            'company_id' => Company::factory()->create()->id,
            'name' => $this->faker->vehicle,
            'size' => $this->faker->randomElement(array_keys(config('constants.vehicle_sizes'))),
            'price_in_amman' => $this->faker->randomFloat(3, 1, 9),
            'price_outside_amman' => $this->faker->randomFloat(3, 2, 9)
        ];
    }

    public function small()
    {
        return $this->state(function ($attributes) {
            $size = array_keys(config('constants.vehicle_sizes'))[0];
            return [
                'size' => $size,
            ];
        });
    }

    public function medium()
    {
        return $this->state(function ($attributes) {
            $size = array_keys(config('constants.vehicle_sizes'))[1];
            return [
                'size' => $size,
            ];
        });
    }

    public function large()
    {
        return $this->state(function ($attributes) {
            $size = array_keys(config('constants.vehicle_sizes'))[2];
            return [
                'size' => $size,
            ];
        });
    }
}
