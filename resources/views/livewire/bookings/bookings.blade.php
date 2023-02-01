<div class="container">

    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <div class="row">
        <div class="col-md-3">
            <input wire:model="search" type="search" class="form-control my-1" id="search" placeholder="Search">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="bg-success text-white">
                <tr>
                    <th>Sr.No.</th>
                    <th style="width: 7%">Booking #</th>
                    <th>Name</th>
                    <th>Vehicle</th>
                    <th>Pickup</th>
                    <th>Drop-off</th>
                    <th style="width: 12%">Date</th>
                    <th>Status</th>
                    <th style="width: 10%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->id }}</td>
                    <td class="text-capitalize">{{ $booking->first_name }} {{$booking->last_name}}</td>
                    <td class="text-capitalize">{{ $booking->vehicle->name ?? '' }}</td>
                    <td class="text-capitalize">{{ $booking->pickup_location }}</td>
                    <td class="text-capitalize">{{ $booking->drop_location }}</td>
                    <td class="text-capitalize">
                        {{ getDateByFormat($booking->pickup_date) }} <br>
                        {{getTimeByFormat($booking->pickup_time)}}
                    </td>
                    <td class="text-capitalize">
                        @if ($booking->booking_status == 1)
                        <span class="badge text-bg-success">Booking Done</span>
                        @else
                        <span class="badge text-bg-primary">Booking Pending</span>
                        @endif

                        @if ($booking->payment_status == 1)
                        <span class="badge text-bg-success">Paid</span>
                        @else
                        <span class="badge text-bg-danger">Unpaid</span>
                        @endif

                    </td>
                    <td>
                        @if ($booking->driver_id)
                        <span class="badge text-bg-success my-1">Assigned - {{$booking->driver->name}}</span>
                        @else
                        <button wire:click="assignDriver({{ $booking->id }})" class="btn btn-warning btn-sm my-1"
                            data-bs-toggle="modal" data-bs-target="#assign_driver_modal"><i
                                class="bi bi-person-fill-add me-1"></i>Assign Driver</button>
                        @endif

                        <div>
                            <button wire:click="show({{ $booking->id }})" class="btn btn-primary btn-sm my-1"
                                data-bs-toggle="modal" data-bs-target="#booking_detail_modal">
                                <i class="bi bi-list me-1"></i>Detail</button>

                            @can('booking-delete')
                            <button onclick="deleteConfirmation('delete-booking','{{$booking->id}}')"
                                class="btn btn-danger btn-sm">
                                <i class="bi bi-trash me-1"></i>Delete</button>
                            @endcan
                        </div>
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

    @include('livewire.bookings.assign-driver')
    @include('livewire.bookings.show')
    @include('livewire.loader')

</div>
