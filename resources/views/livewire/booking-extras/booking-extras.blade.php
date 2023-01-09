<div class="container">

    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    @can('booking-extra-create')
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-success float-end my-1" data-bs-toggle="modal"
                data-bs-target="#booking_extra_modal"><i class="bi bi-plus-lg me-1"></i>Add Booking Extra
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
                @forelse($extras as $extra)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $extra->name }}</td>
                    <td class="text-capitalize">
                        <span class="badge text-bg-{{$extra->status ? 'success' : 'danger'}}">
                            {{ $extra->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        @can('booking-extra-edit')
                        <button wire:click="edit({{ $extra->id }})" class="btn btn-primary btn-sm my-1"
                            data-bs-toggle="modal" data-bs-target="#booking_extra_modal">
                            <i class="bi bi-pencil-square me-1"></i>Edit</button>
                        @endcan

                        @can('booking-extra-delete')
                        <button onclick="deleteConfirmation('delete-extra','{{$extra->id}}')"
                            class="btn btn-danger btn-sm my-1">
                            <i class="bi bi-trash me-1"></i>Delete</button>
                        @endcan
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">There are no extras added yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-lg-6">
            Showing {{ $extras->firstItem() ? $extras->firstItem() : 0 }} to {{ $extras->lastItem() ?
            $extras->lastItem() : 0}} of total
            {{ $extras->total() }} entries
        </div>
        <div class="col-lg-6">
            <div class="d-flex justify-content-end px-2 mx-2 my-2">
                {{ $extras->links() }}
            </div>
        </div>
    </div>

    @can('booking-extra-edit')
    @include('livewire.booking-extras.update')
    @endcan

    @include('livewire.loader')

</div>
