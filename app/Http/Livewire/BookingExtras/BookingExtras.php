<?php

namespace App\Http\Livewire\BookingExtras;

use App\Models\BookingExtra;
use Livewire\Component;
use Livewire\WithPagination;

class BookingExtras extends Component
{
    use WithPagination;

    public $updateMode = false;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';
    public $extras_id, $search, $name, $price, $desc;

    protected $listeners = [
        'delete-extras' => 'delete',
    ];

    public function render()
    {
        return view('livewire.booking-extras.booking-extras', [
            'extras' => BookingExtra::query()
                ->where('name', 'like', '%' . $this->search . '%')
                ->paginate(10),
        ]);
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->price = '';
        $this->desc = '';
        $this->resetValidation();
    }

    public function store()
    {
        $data = $this->validate([
            'name' => ['required', 'string', 'max:100'],
            'price' => ['required', 'numeric'],
            'desc' => ['required', 'string', 'max:100'],
        ]);

        BookingExtra::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'desc' => $data['desc'],
        ]);

        $this->alert('Booking Extras Added!', 'The extras have been created successfully.');
        $this->resetInputFields();
        $this->emit('booking_extra_modal_hide');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $extras = BookingExtra::where('id', $id)->first();
        $this->extras_id = $id;
        $this->name = $extras->name;
        $this->price = $extras->price;
        $this->desc = $extras->desc;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $data = $this->validate([
            'name' => ['required', 'string', 'max:100'],
            'price' => ['required', 'numeric'],
            'desc' => ['required', 'string', 'max:100'],
        ]);

        if ($this->extras_id) {
            $extras = BookingExtra::find($this->extras_id);
            $extras->update([
                'name' => $this->name,
                'price' => $this->price,
                'desc' => $this->desc,
            ]);
            $this->updateMode = false;
            $this->alert('Booking Extras Updated!', 'The extras have been updated successfully.');
            $this->resetInputFields();
            $this->emit('booking_extra_modal_hide');
        }
    }

    public function delete($id)
    {
        $extras = BookingExtra::findOrFail($id);
        $extras->delete();

        $this->alert('Booking Extras Deleted!', 'The extras have been deleted successfully.');
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
