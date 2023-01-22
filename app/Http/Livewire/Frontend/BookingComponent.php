<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Booking;
use App\Models\BookingExtra;
use App\Models\BookingItem;
use App\Models\Vehicle;
use Livewire\Component;
use Cart;

class BookingComponent extends Component
{
    public $current_step = 1;
    protected $listeners = [
        'setGoogleMapPlaces' => 'setGoogleMapPlaces',
        'successGoogleMap' => 'successGoogleMap',
        'failedGoogleMap' => 'failedGoogleMap',
    ];

    public $updateMode = false;
    public $successGoogleMap = false;

    public $booking_extra_id;
    public $booking_extra_qty;
    public $booking_extras = [];
    public $booking_extra_total = 0;
    public $vehicle_total = 0;
    public $grand_total = 0;

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

    public function mount()
    {
        $booking_extras = BookingExtra::get();
        foreach ($booking_extras as $key => $booking_extra) {
            $this->booking_extra_id[$key] = $booking_extra->id;
            $this->booking_extra_qty[$key] = 0;
        }
    }

    public function render()
    {
        if ($this->current_step == 1) {
            $this->emit('google_map_show');
        }
        $vehicles = Vehicle::orderBy('id', 'asc')->get();
        $extras = BookingExtra::get();

        return view('livewire.frontend.booking-component', [
            'vehicles' => $vehicles,
            'extras' => $extras,
        ]);
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

        // $booking = new Booking();
        // $booking->fill($data);
        // Session::put('booking', $booking);
        // Session::get('booking');

        $this->current_step = 2;
        $this->emit('google_map_hide');
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

    public function setGoogleMapPlaces($origin, $destination)
    {
        try {
            $this->pickup_location = $origin;
            $this->drop_location = $destination;

            $ch = curl_init();

            $url = "https://maps.googleapis.com/maps/api/distancematrix/json";
            $data_array = [
                'destinations' => $this->drop_location,
                'origins' => $this->pickup_location,
                'units' => 'imperial',
                'key' => 'AIzaSyBXl5k0hdaecdpWF7AcfhkXv4TN6MvQn6g',
            ];

            $data = http_build_query($data_array);

            $getUrl = $url . "?" . $data;

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_URL, $getUrl);
            curl_setopt($ch, CURLOPT_TIMEOUT, 80);

            $response = curl_exec($ch);

            $response = json_decode($response, true);
            $distance = $response['rows'][0]['elements'][0]['distance']['text'] ?? '';
            $duration = $response['rows'][0]['elements'][0]['duration']['text'] ?? '';

            $this->total_distance = $distance;
            $this->total_time = $duration;

            $this->dispatchBrowserEvent('google-map-updated', [
                'distance' => $distance,
                'duration' => $duration,
            ]);


            curl_close($ch);
        } catch (\Throwable $th) {
            $this->successGoogleMap = false;
        }
    }

    public function changeOrigin()
    {
        $this->successGoogleMap = false;
    }

    public function changeDestination()
    {
        $this->successGoogleMap = false;
    }

    public function successGoogleMap()
    {
        $this->successGoogleMap = true;
    }

    public function selectVehicle($vehicle_id)
    {
        $this->vehicle_id = $vehicle_id;

        $vehicle = Vehicle::find($vehicle_id);
        $this->vehicle_total = $vehicle->ptp_min_amount;
        $this->calculateGrandTotal();
    }

    public function cartIncrement($row)
    {
        $this->booking_extra_qty[$row] =  $this->booking_extra_qty[$row] + 1;

        $result = 0;
        $booking_extra_array = [];
        foreach ($this->booking_extra_qty as $key => $value) {
            $booking_extra = BookingExtra::find($this->booking_extra_id[$key]);
            $booking_extra_array[] = [
                'booking_extra_id'    => $this->booking_extra_id[$key],
                'booking_extra_qty'   => $this->booking_extra_qty[$key],
                'booking_extra_price'   => $booking_extra->price,
                'booking_extra_sum'   => $booking_extra->price * $this->booking_extra_qty[$key],
            ];

            $result = $result + $booking_extra_array[$key]['booking_extra_sum'];
        }

        $this->booking_extra_total = $result;
        $this->calculateGrandTotal();
    }

    public function cartDecrement($row)
    {
        $this->booking_extra_qty[$row] =  $this->booking_extra_qty[$row] - 1;

        $result = 0;
        $booking_extra_array = [];
        foreach ($this->booking_extra_qty as $key => $value) {
            $booking_extra = BookingExtra::find($this->booking_extra_id[$key]);
            $booking_extra_array[] = [
                'booking_extra_id'    => $this->booking_extra_id[$key],
                'booking_extra_qty'   => $this->booking_extra_qty[$key],
                'booking_extra_price'   => $booking_extra->price,
                'booking_extra_sum'   => $booking_extra->price * $this->booking_extra_qty[$key],
            ];

            $result = $result + $booking_extra_array[$key]['booking_extra_sum'];
        }

        $this->booking_extra_total = $result;
        $this->calculateGrandTotal();
    }

    public function calculateGrandTotal()
    {
        $this->grand_total = $this->vehicle_total + $this->booking_extra_total;
    }
}
