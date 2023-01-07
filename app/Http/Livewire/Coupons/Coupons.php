<?php

namespace App\Http\Livewire\Coupons;

use Livewire\Component;
use App\Models\Coupon;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

class Coupons extends Component
{
    use WithPagination;

    public $updateMode = false;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';
    public $coupon_id, $search, $name;

    protected $listeners = [
        'delete-coupon' => 'delete',
    ];

    public function render()
    {
        return view('livewire.coupons.coupons', [
            'coupons' => Coupon::query()
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

        Coupon::create([
            'name' => $data['name'],
        ]);

        $this->alert('Coupon Added!', 'The coupon have been created successfully.');
        $this->resetInputFields();
        $this->emit('coupon_modal_hide');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $coupon = Coupon::where('id', $id)->first();
        $this->coupon_id = $id;
        $this->name = $coupon->name;
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

        if ($this->coupon_id) {
            $coupon = Coupon::find($this->coupon_id);
            $coupon->update([
                'name' => $this->name,
            ]);
            $this->updateMode = false;
            $this->alert('Coupon Updated!', 'The coupon have been updated successfully.');
            $this->resetInputFields();
            $this->emit('coupon_modal_hide');
        }
    }

    public function delete($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        $this->alert('Coupon Deleted!', 'The coupon have been deleted successfully.');
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
