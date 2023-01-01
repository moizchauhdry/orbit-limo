<?php

namespace App\Http\Livewire\Drivers;

use App\Models\Driver;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Drivers extends Component
{
    use WithPagination;

    public $updateMode = false;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';
    public $driver_id, $search, $name, $email, $phone, $category;

    protected $listeners = [
        'delete-driver' => 'delete',
    ];

    public function render()
    {
        return view('livewire.drivers.drivers', [
            'drivers' => Driver::query()
                ->where('name', 'like', '%' . $this->search . '%')
                ->paginate(10),
        ]);
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->category = '';
        $this->status = '';
        $this->resetValidation();
    }

    public function store()
    {
        $data = $this->validate([
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:drivers'],
            'phone' => ['nullable', 'string', 'max:255', 'unique:drivers'],
            'category' => ['required'],
        ]);

        Driver::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'category' => $data['category'],
        ]);

        $this->alert('Driver Added!', 'The driver have been created successfully.');
        $this->resetInputFields();
        $this->emit('driverStore');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $driver = Driver::where('id', $id)->first();
        $this->driver_id = $id;
        $this->name = $driver->name;
        $this->email = $driver->email;
        $this->phone = $driver->phone;
        $this->category = $driver->category;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $data = $this->validate([
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('drivers')->ignore($this->driver_id, 'id')],
            'phone' => ['nullable', Rule::unique('drivers')->ignore($this->driver_id, 'id')],
            'category' => ['required'],
        ]);

        if ($this->driver_id) {
            $driver = Driver::find($this->driver_id);
            $driver->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'category' => $this->category,
            ]);
            $this->updateMode = false;
            $this->alert('Driver Updated!', 'The driver have been updated successfully.');
            $this->resetInputFields();
            $this->emit('driverStore');
        }
    }

    public function delete($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();

        $this->alert('Driver Deleted!', 'The driver have been deleted successfully.');
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
