<div class="container">

    <div wire:loading wire:target="store,edit,update,delete,cancel,previousPage,nextPage,gotoPage">
        <div class="livewire-loader">
            <img src="{{asset('images/loader.gif')}}" style="width:50px;height:50px">
        </div>
    </div>

    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <div>
        <form>
            <input type="hidden" wire:model="user_id">
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" wire:model="name">
                    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="col-md-3 form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email" wire:model="email">
                    @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                @if (!$edit_mode)
                <div class="col-md-3 form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password"
                        wire:model="password">
                    @error('password') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="col-md-3 form-group">
                    <label for="password">Password Confirmation</label>
                    <input type="password" class="form-control" id="password_confirmation"
                        placeholder="Enter Password Confirmation" wire:model="password_confirmation">
                    @error('password_confirmation') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if ($edit_mode)
                    <button wire:click.prevent="update()" class="btn btn-dark float-end mx-1 my-1">Save &
                        Update</button>
                    <button wire:click.prevent="cancel()" class="btn btn-danger float-end mx-1 my-1">Cancel</button>
                    @else
                    <button wire:click.prevent="store()" class="btn btn-success float-end mx-1 my-1">Save &
                        Submit</button>
                    @endif
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-md-3">
            <input wire:model="search" type="search" placeholder="Search users by name..." class="form-control">
        </div>
    </div>

    <div wire:loading wire:target="search">
        <div class="livewire-table-loader">
            <img src="{{asset('images/table-loader.gif')}}" style="width:50px;height:50px">
        </div>
    </div>

    <table class="table table-bordered mt-2">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <button wire:click="edit({{ $user->id }})" class="btn btn-primary btn-sm">
                        <i class="bi bi-pencil-square me-1"></i>Edit</button>
                    <button wire:click="delete({{ $user->id }})" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash me-1"></i>Delete</button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">There are no users found yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="row">
        <div class="col-lg-6">
            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of total
            {{ $users->total() }} entries
        </div>
        <div class="col-lg-6">
            <div class="d-flex justify-content-end px-2 mx-2 my-2">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
