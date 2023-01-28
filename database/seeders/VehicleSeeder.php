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
                'image' => null,
                'passenger' => 3,
                'suitcase' => 2,
                'status' => true,
                'ptp_min_amount' => 140,
                'ptp_min_distance' => 20,
                'ptp_adt_amount_per_km' => 3,
                'ptp_amount_peak_hrs' => 45,
                'ptp_peak_hrs' => '2pm - 6pm',
                'ptp_amount_per_stop' => 20,
                'hrly_min_amount' => 200,
                'hrly_min_hour' => 1,
                'hrly_adt_amount_per_hour' => 140,
                'hrly_amount_per_km_allowed' => 30,
            ],
            [
                'name' => 'SUV',
                'image' => null,
                'passenger' => 5,
                'suitcase' => 3,
                'status' => true,
                'ptp_min_amount' => 160,
                'ptp_min_distance' => 20,
                'ptp_adt_amount_per_km' => 4,
                'ptp_amount_peak_hrs' => 45,
                'ptp_peak_hrs' => '2pm - 6pm',
                'ptp_amount_per_stop' => 20,
                'hrly_min_amount' => 250,
                'hrly_min_hour' => 1,
                'hrly_adt_amount_per_hour' => 150,
                'hrly_amount_per_km_allowed' => 30,
            ],
        ];

        foreach ($vehicles as $vehicle) {
            Vehicle::updateOrCreate(['name' => $vehicle['name']], $vehicle);
        }
    }
}
