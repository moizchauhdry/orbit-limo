<?php

namespace App\Http\Livewire\Bookings;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

class Bookings extends Component
{
    use WithPagination;

    public $updateMode = false;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';
    public $booking_data;
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
        $driver_id,
        $passenger,
        $suitcase,
        $first_name,
        $last_name,
        $email,
        $phone,
        $comments;

    protected $listeners = [
        'delete-booking' => 'delete',
    ];

    public function render()
    {
        $bookings = Booking::orderBy('id', 'desc')
            ->where('id', 'like', '%' . $this->search . '%')
            ->paginate(10);

        $vehicles = Vehicle::get();
        $drivers = Driver::get();

        return view('livewire.bookings.bookings', [
            'bookings' => $bookings,
            'vehicles' => $vehicles,
            'drivers' => $drivers
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

    public function store()
    {
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
            'comments' => ['nullable'],
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

        $this->alert('Booking Added!', 'The booking have been created successfully.');
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
            $this->alert('Booking Updated!', 'The booking have been updated successfully.');
            $this->resetInputFields();
            $this->emit('booking_modal_hide');
        }
    }

    public function delete($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        $this->alert('Booking Deleted!', 'The booking have been deleted successfully.');
    }

    public function alertConfirm()
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'If deleted, you will not be able to recover this imaginary file!'
        ]);
    }

    public function alert($title, $text)
    {
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => $title,
            'text' =>  $text
        ]);
    }

    public function assignDriver($id)
    {
        $data = $this->validate([
            'driver_id' => ['required'],
        ]);

        $booking = Booking::find($id);
        $booking->update([
            'driver_id' => $data['driver_id'],
            'driver_status' =>  true,
        ]);
    }

    public function show($id)
    {
        $this->booking_data = Booking::find($id);
    }
}
