<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
//        User::factory()->asCustomer()->create();
//        User::factory()->asManager()->create();
        User::factory()->asAdmin()->create();

        User::factory(10)->create();

        Company::factory(10)->create();

        Vehicle::factory(10)->create();
    }
}
