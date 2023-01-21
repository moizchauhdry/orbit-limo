<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Booking;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class BookingComponent extends Component
{
    public $current_step = 1;
    public $updateMode = false;
    public
        $booking_id,
        $pickup_date,
        $pickup_time,
        $pickup_location,
        $drop_location,
        $total_distance,
        $total_time,
        $vehicle_id,
        $passenger,
        $suitcase,
        $first_name,
        $last_name,
        $email,
        $phone,
        $comments;

    public function render()
    {
        return view('livewire.frontend.booking-component');
    }

    public function submitStep1()
    {
        $data = $this->validate([
            'pickup_date' => ['nullable'],
            'pickup_time' => ['nullable'],
            'pickup_location' => ['nullable'],
            'drop_location' => ['nullable'],
            // 'total_distance' => ['nullable'],
            // 'total_time' => ['nullable'],
        ]);

        $booking = new Booking();
        $booking->fill($data);
        Session::put('booking', $booking);
        Session::get('booking');

        $this->current_step = 2;
    }

    public function submitStep2()
    {

        $this->current_step = 3;
    }

    public function submitStep3()
    {
        $this->current_step = 4;
    }

    public function submitStep4()
    {
        $this->current_step = 5;
    }

    public function back($step)
    {
        $this->current_step = $step;
        $this->render();
    }
}
