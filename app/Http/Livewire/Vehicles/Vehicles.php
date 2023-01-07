<?php

namespace App\Http\Livewire\Vehicles;

use App\Models\Vehicle;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Vehicles extends Component
{
    use WithPagination;

    public $updateMode = false;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';
    public $vehicle_id, $search, $name;

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
            'name' => ['required', 'string', 'min:3', 'max:255'],
        ]);

        Vehicle::create([
            'name' => $data['name'],
        ]);

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
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $data = $this->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
        ]);

        if ($this->vehicle_id) {
            $vehicle = Vehicle::find($this->vehicle_id);
            $vehicle->update([
                'name' => $this->name,
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
