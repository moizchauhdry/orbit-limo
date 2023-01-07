<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Booking::create([
            'pickup_date' => '2023-01-07',
            'pickup_time' => '7:30',
            'pickup_location' => 'Pearson Airport Terminal 1 Parking, Missisaunga, ON, Canada',
            'drop_location' => '3552 Redmond Road, Missisaunga, ON, Canada',
            'total_distance' => '12.1',
            'total_time' => '2 h 19 m',
            'vehicle_id' => 1,
            'passenger' => 2,
            'suitcase' => 2,
            'first_name' => 'Moiz',
            'last_name' => 'Chauhdry',
            'email' => 'moizchauhdry@gmail.com',
            'phone' => '+92-320-4650583',
            'comments' => 'Test comments',
        ]);
    }
}
