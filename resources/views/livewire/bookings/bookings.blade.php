<div class="container">

    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    @can('booking-create')
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.bookings.create')}}" class="btn btn-success float-end my-1">
                <i class="bi bi-plus-lg me-1"></i>Add Booking
            </a>
            {{-- <button type="button" class="btn btn-success float-end my-1" data-bs-toggle="modal"
                data-bs-target="#booking_modal"><i class="bi bi-plus-lg me-1"></i>Add Booking
            </button> --}}
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
                    <th>Vehicle</th>
                    <th>Pickup</th>
                    <th>Drop-off</th>
                    <th>Status</th>
                    <th width="150px">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->first_name }}</td>
                    <td>{{ $booking->email }}</td>
                    <td class="text-capitalize">{{ $booking->phone }}</td>
                    <td class="text-capitalize">{{ $booking->vehicle->name ?? '' }}</td>
                    <td class="text-capitalize">{{ $booking->pickup_location }}</td>
                    <td class="text-capitalize">{{ $booking->drop_location }}</td>
                    <td class="text-capitalize">
                        <span class="badge text-bg-{{$booking->status ? 'success' : 'danger'}}">
                            {{ $booking->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        {{-- @can('booking-edit')
                        <button wire:click="edit({{ $booking->id }})" class="btn btn-primary btn-sm my-1"
                            data-bs-toggle="modal" data-bs-target="#booking_modal">
                            <i class="bi bi-pencil-square me-1"></i>Edit</button>
                        @endcan --}}

                        @can('booking-delete')
                        <button onclick="deleteConfirmation('delete-booking','{{$booking->id}}')"
                            class="btn btn-danger btn-sm my-1">
                            <i class="bi bi-trash me-1"></i>Delete</button>
                        @endcan
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">There are no bookings added yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-lg-6">
            Showing {{ $bookings->firstItem() ? $bookings->firstItem() : 0 }} to {{ $bookings->lastItem() ?
            $bookings->lastItem() : 0}} of total
            {{ $bookings->total() }} entries
        </div>
        <div class="col-lg-6">
            <div class="d-flex justify-content-end px-2 mx-2 my-2">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>

    {{-- @can('booking-edit')
    @include('livewire.bookings.update')
    @endcan --}}

    @include('livewire.loader')

</div>
