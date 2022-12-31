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

    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-success float-end my-1" data-bs-toggle="modal"
                data-bs-target="#user_modal">
                <i class="bi bi-plus-lg me-1"></i>Add User
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <input wire:model="search" type="search" class="form-control my-1" id="search" placeholder="Search">
        </div>
    </div>

    <div wire:loading wire:target="search">
        <div class="livewire-table-loader">
            <img src="{{asset('images/table-loader.gif')}}" style="width:50px;height:50px">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered mt-2">
            <thead class="bg-success text-white">
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
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button wire:click="edit({{ $user->id }})" class="btn btn-primary btn-sm my-1"
                            data-bs-toggle="modal" data-bs-target="#user_modal">
                            <i class="bi bi-pencil-square me-1"></i>Edit</button>
                        <button wire:click="delete({{ $user->id }})" class="btn btn-danger btn-sm my-1">
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
    </div>

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

    @include('livewire.update')

</div>
