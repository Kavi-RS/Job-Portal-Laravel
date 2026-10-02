<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        Location::insert([
            ['name' => 'Chennai'],
            ['name' => 'Madurai'],
            ['name' => 'Coimbatore'],
            ['name' => 'Trichy'],
            ['name' => 'Salem'],
            ['name' => 'Tirunelveli'],
            ['name' => 'Bangalore'],
            ['name' => 'Hyderabad'],
            ['name' => 'Mumbai'],
            ['name' => 'Delhi'],
        ]);
    }
}