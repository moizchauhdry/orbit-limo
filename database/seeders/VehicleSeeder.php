<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicles = [
            [
                'name' => 'Sedan',
            ],
            [
                'name' => 'SUV',
            ],
        ];

        foreach ($vehicles as $vehicle) {
            Vehicle::updateOrCreate(['name' => $vehicle['name']], $vehicle);
        }
    }
}
