<?php

namespace App\Http\Livewire\Customers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Customers extends Component
{
    use WithPagination;

    public $updateMode = false;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';
    public $user_id, $name, $email, $phone, $role, $password, $password_confirmation, $search;

    protected $listeners = [
        'delete-user' => 'delete',
    ];

    public function render()
    {
        $user = Auth::user();

        $users = User::query()
            ->whereHas('roles', function ($qry) {
                $qry->where('name', 'customer');
            })
            ->where('id', '!=', 1)
            ->where('id', '!=', $user->id)
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);

        $roles = Role::get();

        return view('livewire.customers.customers', [
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->phone = '';
        $this->role = '';
        $this->resetValidation();
    }

    public function store()
    {
        $data = $this->validate([
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole(2); // Customer
        $this->resetInputFields();

        $this->alert('Customer Created!', 'The user have been created successfully.');
        $this->emit('userStore');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $user = User::where('id', $id)->first();
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->role = $user->roles[0]->id;
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
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user_id, 'id')],
            'phone' => ['nullable', Rule::unique('users')->ignore($this->user_id, 'id')],
        ]);

        if ($this->user_id) {
            $user = User::find($this->user_id);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);

            $user->syncRoles($this->role);
            $this->updateMode = false;
            $this->resetInputFields();

            $this->alert('Customer Updated!', 'The user have been updated successfully.');
            $this->emit('userStore');
        }
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $this->alert('Customer Deleted!', 'The user have been deleted successfully.');
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
