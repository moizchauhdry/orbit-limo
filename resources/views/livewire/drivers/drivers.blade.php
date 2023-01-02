<div class="container">

    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    @can('driver-create')
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-success float-end my-1" data-bs-toggle="modal"
                data-bs-target="#driver_modal"><i class="bi bi-plus-lg me-1"></i>Add Driver
            </button>
        </div>
    </div>
    @endcan

    <div class="row">
        <div class="col-md-3">
            <input wire:model="search" type="search" class="form-control my-1" id="search" placeholder="Search">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="bg-success text-white">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th width="150px">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($drivers as $driver)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $driver->name }}</td>
                    <td>{{ $driver->email }}</td>
                    <td class="text-capitalize">{{ $driver->phone }}</td>
                    <td class="text-capitalize">{{ $driver->category }}</td>
                    <td class="text-capitalize">
                        <span class="badge text-bg-{{$driver->status ? 'success' : 'danger'}}">
                            {{ $driver->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        @can('driver-edit')
                        <button wire:click="edit({{ $driver->id }})" class="btn btn-primary btn-sm my-1"
                            data-bs-toggle="modal" data-bs-target="#driver_modal">
                            <i class="bi bi-pencil-square me-1"></i>Edit</button>
                        @endcan

                        @can('driver-delete')
                        <button onclick="deleteConfirmation('delete-driver','{{$driver->id}}')"
                            class="btn btn-danger btn-sm my-1">
                            <i class="bi bi-trash me-1"></i>Delete</button>
                        @endcan
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">There are no drivers added yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-lg-6">
            Showing {{ $drivers->firstItem() ? $drivers->firstItem() : 0 }} to {{ $drivers->lastItem() ?
            $drivers->lastItem() : 0}} of total
            {{ $drivers->total() }} entries
        </div>
        <div class="col-lg-6">
            <div class="d-flex justify-content-end px-2 mx-2 my-2">
                {{ $drivers->links() }}
            </div>
        </div>
    </div>

    @can('driver-edit')
    @include('livewire.drivers.update')
    @endcan

    @include('livewire.loader')

</div>
