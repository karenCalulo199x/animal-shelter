<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;
use App\Models\Employee;
use App\Models\Rescuer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Animal::factory(5)->create();
        Rescuer::factory(10)->create();
        Employee::factory(10)->create();
    }
}
