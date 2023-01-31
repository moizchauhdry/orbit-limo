<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Booking;
use App\Models\BookingExtra;
use App\Models\BookingItem;
use App\Models\User;
use App\Models\Vehicle;
use App\Notifications\AdminBookingNotification;
use App\Notifications\BookingNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class BookingComponent extends Component
{
    public $current_step = 1;
    protected $listeners = [
        'setGoogleMapPlaces' => 'setGoogleMapPlaces',
        'successGoogleMap' => 'successGoogleMap',
        'failedGoogleMap' => 'failedGoogleMap',
    ];

    public $disabled = false;
    public $updateMode = false;
    public $successGoogleMap = false;

    public $booking_extra_id;
    public $booking_extra_qty;
    public $booking_extras = [];
    public $booking_extra_array = [];
    public $booking_extra_total = 0;
    public $vehicle_total = 0;
    public $grand_total = 0;
    public $hst_amount = 0;
    public $payment_method = 1;
    public $service_type = 1;
    public $total_time = '0 h';

    public
        $booking_id,
        $pickup_date,
        $pickup_time,
        $pickup_location,
        $drop_location,
        $total_distance,
        $duration_in_hours,
        $transfer_type,
        $vehicle_id,
        $first_name,
        $last_name,
        $email,
        $phone,
        $comments,
        $booking_status,
        $payment_status;

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
        if ($this->total_distance == null) {
            $this->alert('warning', 'Google Maps !', 'The origin or destination point is not valid. Please select the values from the dropdown list.');
        }

        $data = $this->validate([
            'pickup_date' => ['required'],
            'pickup_time' => ['required'],
            'pickup_location' => ['required'],
            'drop_location' => [Rule::requiredIf($this->service_type == 1)],
            'total_distance' => ['required'],
            'total_time' => ['required'],
            'service_type' => ['required', 'in:1,2'],
            'duration_in_hours' =>  [Rule::requiredIf($this->service_type == 2)],
        ], [
            'required' => 'THE FIELD IS REQUIRED.'
        ]);

        $this->current_step = 2;
        $this->disabled = true;
        $this->emit('google_map_hide');
    }

    public function submitStep2()
    {
        if ($this->vehicle_id == null) {
            $this->alert('warning', 'Select Vehicle', 'Please select the vehicle to continue your process.');
        }

        $data = $this->validate([
            'vehicle_id' => ['required'],
        ]);

        $this->current_step = 3;
    }

    public function submitStep3()
    {
        $data = $this->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'comments' => ['nullable'],
        ]);

        $this->current_step = 4;
    }

    public function submitStep4()
    {
        $booking = Booking::create([
            'pickup_date' => $this->pickup_date,
            'pickup_time' => $this->pickup_time,
            'pickup_location' => $this->pickup_location,
            'drop_location' => $this->drop_location,
            'total_distance' => $this->total_distance,
            'total_time' => $this->total_time,
            'duration_in_hours' => $this->duration_in_hours,
            'service_type' => 'Distance',
            'transfer_type' => 'One Way',
            'vehicle_id' => $this->vehicle_id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'comments' => $this->comments,
            'grand_total' => $this->grand_total,
            'payment_method' => $this->payment_method,
        ]);

        foreach ($this->booking_extra_array as $key => $extra) {
            BookingItem::create([
                'booking_id' => $booking->id,
                'booking_extra_id' => $extra['booking_extra_id'],
                'qty' => $extra['booking_extra_qty'],
            ]);
        }

        try {
            $user = User::updateOrCreate(['email' => $booking->email], [
                'name' => $booking->first_name . ' ' . $booking->last_name,
                'email' => $booking->email,
                'phone' => $booking->phone,
                'password' => Hash::make('password')
            ]);

            $user->assignRole(2);
            $user->notify(new BookingNotification($booking));
            $admin_users = User::whereHas('roles', function ($qry) {
                $qry->where('name', 'admin');
            })->get();
            Notification::send($admin_users, new AdminBookingNotification());
        } catch (\Throwable $th) {
            //throw $th;
        }

        return redirect()->route('booking.square-payment', $booking->id);
    }

    public function back($step)
    {
        $this->current_step = $step;
    }

    public function setGoogleMapPlaces($origin, $destination)
    {
        try {
            $this->pickup_location = $origin;
            $this->drop_location = $destination;

            if ($this->service_type == 2 && $this->drop_location == NULL) {
                $destination = $origin;
            }

            $ch = curl_init();

            $url = "https://maps.googleapis.com/maps/api/distancematrix/json";
            $data_array = [
                'destinations' => $destination,
                'origins' => $origin,
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
        $this->vehicle_total = calculateVehicleAmount($vehicle_id, $this->service_type, $this->total_distance, $this->duration_in_hours);
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
        $this->booking_extra_array = $booking_extra_array;
        $this->calculateGrandTotal();
    }

    public function cartDecrement($row)
    {
        if ($this->booking_extra_qty[$row] > 0) {
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
            $this->booking_extra_array = $booking_extra_array;
            $this->calculateGrandTotal();
        }
    }

    public function calculateGrandTotal()
    {
        $total = $this->vehicle_total + $this->booking_extra_total;
        $hst = $total * 13 / 100;
        $this->hst_amount = number_format((float)$hst, 2, '.', '');
        $this->grand_total = $total + $this->hst_amount;
    }

    public function changeLocation()
    {
        $this->disabled = false;
        if ($this->current_step == 1) {
            $this->emit('init-map');
            $this->pickup_location = '';
            $this->drop_location = '';
            $this->total_distance = '';
            $this->total_time = '';
        }
    }

    public function serviceType($service_type)
    {
        $this->service_type = $service_type;
    }

    public function alert($type, $title, $text)
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => $type,
            'title' => $title,
            'text' =>  $text
        ]);
    }
}
