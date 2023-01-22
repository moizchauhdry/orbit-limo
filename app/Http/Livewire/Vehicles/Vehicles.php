<?php

namespace App\Http\Livewire\Vehicles;

use App\Models\Vehicle;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Vehicles extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $updateMode = false;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';
    public $vehicle_image;
    public
        $vehicle_id,
        $search,
        $name,
        $image,
        $status,
        $ptp_min_amount,
        $ptp_min_distance,
        $ptp_adt_amount_per_km,
        $ptp_amount_peak_hrs,
        $ptp_peak_hrs,
        $ptp_amount_per_stop,
        $hrly_min_amount,
        $hrly_min_hour,
        $hrly_adt_amount_per_hour,
        $hrly_amount_per_km_allowed;

    protected $listeners = [
        'delete-vehicle' => 'delete',
    ];

    public function render()
    {
        return view('livewire.vehicles.vehicles', [
            'vehicles' => Vehicle::query()
                ->where('name', 'like', '%' . $this->search . '%')
                ->paginate(10),
        ]);
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->resetValidation();
    }

    public function store()
    {
        $data = $this->validate([
            'name' => ['required'],
            'image' => ['nullable'],
            'ptp_min_amount' => ['required', 'numeric'],
            'ptp_min_distance' => ['required', 'numeric'],
            'ptp_adt_amount_per_km' => ['required', 'numeric'],
            'ptp_amount_peak_hrs' => ['required', 'numeric'],
            'ptp_peak_hrs' => ['required', 'string'],
            'ptp_amount_per_stop' => ['required', 'numeric'],
            'hrly_min_amount' => ['required', 'numeric'],
            'hrly_min_hour' => ['required', 'numeric'],
            'hrly_adt_amount_per_hour' => ['required', 'numeric'],
            'hrly_amount_per_km_allowed' => ['required', 'numeric'],
        ]);

        $vehicle = Vehicle::create([
            'name' => $data['name'],
            'ptp_min_amount' => $data['ptp_min_amount'],
            'ptp_min_distance' => $data['ptp_min_distance'],
            'ptp_adt_amount_per_km' => $data['ptp_adt_amount_per_km'],
            'ptp_amount_peak_hrs' => $data['ptp_amount_peak_hrs'],
            'ptp_peak_hrs' => $data['ptp_peak_hrs'],
            'ptp_amount_per_stop' => $data['ptp_amount_per_stop'],
            'hrly_min_amount' => $data['hrly_min_amount'],
            'hrly_min_hour' => $data['hrly_min_hour'],
            'hrly_adt_amount_per_hour' => $data['hrly_adt_amount_per_hour'],
            'hrly_amount_per_km_allowed' => $data['hrly_amount_per_km_allowed'],
        ]);

        $this->image->storePublicly('vehicle-images');
        $vehicle->update(['image' => $this->image->storePublicly('vehicle-images')]);

        $this->alert('Vehicle Added!', 'The vehicle have been created successfully.');
        $this->resetInputFields();
        $this->emit('vehicle_modal_hide');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $vehicle = Vehicle::where('id', $id)->first();
        $this->vehicle_id = $id;
        $this->name = $vehicle->name;
        $this->image = $vehicle->image;
        $this->ptp_min_amount = $vehicle->ptp_min_amount;
        $this->ptp_min_distance = $vehicle->ptp_min_distance;
        $this->ptp_adt_amount_per_km = $vehicle->ptp_adt_amount_per_km;
        $this->ptp_amount_peak_hrs = $vehicle->ptp_amount_peak_hrs;
        $this->ptp_peak_hrs = $vehicle->ptp_peak_hrs;
        $this->ptp_amount_per_stop = $vehicle->ptp_amount_per_stop;
        $this->hrly_min_amount = $vehicle->hrly_min_amount;
        $this->hrly_min_hour = $vehicle->hrly_min_hour;
        $this->hrly_adt_amount_per_hour = $vehicle->hrly_adt_amount_per_hour;
        $this->hrly_amount_per_km_allowed = $vehicle->hrly_amount_per_km_allowed;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $data = $this->validate([
            'name' => ['required'],
            'image' => ['nullable'],
            'ptp_min_amount' => ['required', 'numeric'],
            'ptp_min_distance' => ['required', 'numeric'],
            'ptp_adt_amount_per_km' => ['required', 'numeric'],
            'ptp_amount_peak_hrs' => ['required', 'numeric'],
            'ptp_peak_hrs' => ['required', 'string'],
            'ptp_amount_per_stop' => ['required', 'numeric'],
            'hrly_min_amount' => ['required', 'numeric'],
            'hrly_min_hour' => ['required', 'numeric'],
            'hrly_adt_amount_per_hour' => ['required', 'numeric'],
            'hrly_amount_per_km_allowed' => ['required', 'numeric'],
        ]);

        if ($this->vehicle_id) {
            $vehicle = Vehicle::find($this->vehicle_id);
            $vehicle->update([
                'name' => $this->name,
                'image' => $this->image,
                'ptp_min_amount' => $this->ptp_min_amount,
                'ptp_min_distance' => $this->ptp_min_distance,
                'ptp_adt_amount_per_km' => $this->ptp_adt_amount_per_km,
                'ptp_amount_peak_hrs' => $this->ptp_amount_peak_hrs,
                'ptp_peak_hrs' => $this->ptp_peak_hrs,
                'ptp_amount_per_stop' => $this->ptp_amount_per_stop,
                'hrly_min_amount' => $this->hrly_min_amount,
                'hrly_min_hour' => $this->hrly_min_hour,
                'hrly_adt_amount_per_hour' => $this->hrly_adt_amount_per_hour,
                'hrly_amount_per_km_allowed' => $this->hrly_amount_per_km_allowed,
            ]);
            $this->updateMode = false;
            $this->alert('Vehicle Updated!', 'The vehicle have been updated successfully.');
            $this->resetInputFields();
            $this->emit('vehicle_modal_hide');
        }
    }

    public function delete($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        $this->alert('Vehicle Deleted!', 'The vehicle have been deleted successfully.');
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
}
