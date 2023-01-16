<?php

namespace App\Http\Livewire\Bookings;

use App\Models\Booking;
use App\Models\Vehicle;
use Livewire\Component;

class CreateBooking extends Component
{
    protected $listeners = [
        'setGoogleMapPlaces' => 'setGoogleMapPlaces',
        'successGoogleMap' => 'successGoogleMap',
        'failedGoogleMap' => 'failedGoogleMap',
    ];

    public $updateMode = false;
    public $successGoogleMap = false;
    public
        $booking_id,
        $search,
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
        return view('livewire.bookings.create-booking', [
            'vehicles' => Vehicle::get()
        ]);
    }

    public function store()
    {
        if ($this->successGoogleMap == false) {
            $this->total_distance = '';
            $this->total_time = '';

            $this->alert('warning', 'Google Maps !', 'The origin or destination point is not valid. Please select the values from the dropdown list.');
        }

        $data = $this->validate([
            'pickup_date' => ['required'],
            'pickup_time' => ['required'],
            'pickup_location' => ['required'],
            'drop_location' => ['required'],
            'total_distance' => ['required'],
            'total_time' => ['required'],
            'vehicle_id' => ['required'],
            'passenger' => ['required'],
            'suitcase' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'comments' => ['required'],
        ]);

        Booking::create([
            'pickup_date' => $data['pickup_date'],
            'pickup_time' => $data['pickup_time'],
            'pickup_location' => $data['pickup_location'],
            'drop_location' => $data['drop_location'],
            'total_distance' => $data['total_distance'],
            'total_time' => $data['total_time'],
            'vehicle_id' => $data['vehicle_id'],
            'passenger' => $data['passenger'],
            'suitcase' => $data['suitcase'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'comments' => $data['comments'],
        ]);

        $this->alert('success', 'Booking Added!', 'The booking have been created successfully.');
        $this->resetInputFields();
        $this->emit('booking_modal_hide');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $booking = Booking::find($id);
        $this->booking_id = $id;
        $this->pickup_date = $booking->pickup_date;
        $this->pickup_time = $booking->pickup_time;
        $this->pickup_location = $booking->pickup_location;
        $this->drop_location = $booking->drop_location;
        $this->total_distance = $booking->total_distance;
        $this->total_time = $booking->total_time;
        $this->vehicle_id = $booking->vehicle_id;
        $this->passenger = $booking->passenger;
        $this->suitcase = $booking->suitcase;
        $this->first_name = $booking->first_name;
        $this->last_name = $booking->last_name;
        $this->email = $booking->email;
        $this->phone = $booking->phone;
        $this->comments = $booking->comments;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $this->validate([
            'pickup_date' => ['required'],
            'pickup_time' => ['required'],
            'pickup_location' => ['required'],
            'drop_location' => ['required'],
            'total_distance' => ['required'],
            'total_time' => ['required'],
            'vehicle_id' => ['required'],
            'passenger' => ['required'],
            'suitcase' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'comments' => ['nullable'],
        ]);

        if ($this->booking_id) {
            $booking = Booking::find($this->booking_id);
            $booking->update([
                'pickup_date' => $this->pickup_date,
                'pickup_time' => $this->pickup_time,
                'pickup_location' => $this->pickup_location,
                'drop_location' => $this->drop_location,
                'total_distance' => $this->total_distance,
                'total_time' => $this->total_time,
                'vehicle_id' => $this->vehicle_id,
                'passenger' => $this->passenger,
                'suitcase' => $this->suitcase,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone' => $this->phone,
                'comments' => $this->comments,
            ]);
            $this->updateMode = false;
            $this->alert('success', 'Booking Updated!', 'The booking have been updated successfully.');
            $this->resetInputFields();
            $this->emit('booking_modal_hide');
        }
    }

    public function delete($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        $this->alert('success', 'Booking Deleted!', 'The booking have been deleted successfully.');
    }

    public function alertConfirm()
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);
    }

    public function alert($type, $title, $text)
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => $type,
            'title' => $title,
            'text' =>  $text
        ]);
    }

    private function resetInputFields()
    {
        $this->pickup_date = '';
        $this->pickup_time = '';
        $this->pickup_location = '';
        $this->drop_location = '';
        $this->total_distance = '';
        $this->total_time = '';
        $this->vehicle_id = '';
        $this->passenger = '';
        $this->suitcase = '';
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->phone = '';
        $this->comments = '';
        $this->resetValidation();
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
}
