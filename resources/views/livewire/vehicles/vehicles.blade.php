<div class="container">

    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    @can('vehicle-create')
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-success float-end my-1" data-bs-toggle="modal"
                data-bs-target="#vehicle_modal"><i class="bi bi-plus-lg me-1"></i>Add Vehicle
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
                    <th>Status</th>
                    <th width="150px">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vehicles as $vehicle)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $vehicle->name }}</td>
                    <td class="text-capitalize">
                        <span class="badge text-bg-{{$vehicle->status ? 'success' : 'danger'}}">
                            {{ $vehicle->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        @can('vehicle-edit')
                        <button wire:click="edit({{ $vehicle->id }})" class="btn btn-primary btn-sm my-1"
                            data-bs-toggle="modal" data-bs-target="#vehicle_modal">
                            <i class="bi bi-pencil-square me-1"></i>Edit</button>
                        @endcan

                        @can('vehicle-delete')
                        <button onclick="deleteConfirmation('delete-vehicle','{{$vehicle->id}}')"
                            class="btn btn-danger btn-sm my-1">
                            <i class="bi bi-trash me-1"></i>Delete</button>
                        @endcan
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">There are no vehicles added yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-lg-6">
            Showing {{ $vehicles->firstItem() ? $vehicles->firstItem() : 0 }} to {{ $vehicles->lastItem() ?
            $vehicles->lastItem() : 0}} of total
            {{ $vehicles->total() }} entries
        </div>
        <div class="col-lg-6">
            <div class="d-flex justify-content-end px-2 mx-2 my-2">
                {{ $vehicles->links() }}
            </div>
        </div>
    </div>

    @can('vehicle-edit')
    @include('livewire.vehicles.update')
    @endcan

    @include('livewire.loader')

</div>
