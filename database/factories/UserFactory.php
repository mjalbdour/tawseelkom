<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
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
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone_number' => $this->faker->unique()->phoneNumber(),
            'address' => $this->faker->address(),
            'remember_token' => Str::random(10),
        ];
    }

    public function asManager()
    {
        return $this->state(function ($attributes) {
            return [
                'role' => "manager",
            ];
        });
    }

    public function asAdmin()
    {
        return $this->state(function ($attributes) {
            return [
                'name' => "Abdelrahman Abu Tina",
                'email' => "a.abutina@tawseelkom.com",
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'phone_number' => "0777777777",
                'address' => "Madaba",
                'role' => "admin",
            ];
        });
    }
}
