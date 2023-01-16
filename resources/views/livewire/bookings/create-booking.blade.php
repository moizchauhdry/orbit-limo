<div>
    <div class="card p-4 shadow">
        <form>
            <input type="hidden" wire:model.defer="user_id">

            <div style="display: none">
                <input type="text" wire:model.defer="getDistance" id="getDistance">
                <input type="text" wire:model.defer="getTime" id="getTime">
            </div>

            <h6 class="text-center"><u>Ride Information</u></h6>

            <div class="row">
                <div class="col-md-6 form-group mb-2">
                    <label for="pickup_date"><strong>Pickup Date</strong></label>
                    <input type="date" class="form-control" wire:model.defer="pickup_date" id="pickup_date">
                    @error('pickup_date') <span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="col-md-6 form-group mb-2">
                    <label for="pickup_time"><strong>Pickup Time</strong></label>
                    <input type="time" class="form-control" wire:model.defer="pickup_time" id="pickup_time">
                    @error('pickup_time') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="col-md-6 form-group mb-2">
                    <label for="pickup_location"><strong>Pickup Location</strong></label>
                    <input wire:model.defer="pickup_location" wire:keyup="changeOrigin" wire:ignore type="text"
                        class="form-control" id="origin-input" autocomplete="off">
                    @error('pickup_location') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="col-md-6 form-group mb-2">
                    <label for="drop_location"><strong>Drop-off Location</strong></label>
                    <input wire:model.defer="drop_location" wire:keyup="changeDestination" wire:ignore type="text"
                        class="form-control destination-input" id="destination-input" value="1">
                    @error('drop_location') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div style="display: none">
                    <div class="col-md-6 form-group mb-2">
                        <label for="total_distance"><strong>Total Distance</strong></label>
                        <input type="text" class="form-control" wire:model.defer="total_distance" id="distance-input"
                            readonly>
                        @error('total_distance') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6 form-group mb-2">
                        <label for="total_time"><strong>Total Time</strong></label>
                        <input type="text" class="form-control" wire:model.defer="total_time" id="time-input" readonly>
                        @error('total_time') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <h6 class="text-center mt-4"><u>Vehicle Information</u></h6>
            <div class="row">
                <div class="form-group col-md-6 mb-2">
                    <label for="vehicle_id"><strong>Vehicle</strong></label>
                    <select wire:model.defer="vehicle_id" class="form-select" id="vehicle_id"
                        aria-label="Floating label select example">
                        <option value="" selected>--Select Vehicle--</option>
                        @foreach ($vehicles as $vehicle)
                        <option value="{{$vehicle->id}}">{{$vehicle->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 form-group mb-2">
                    <label for="passenger"><strong>Passenger</strong></label>
                    <input type="number" class="form-control" wire:model.defer="passenger" id="passenger">
                    @error('passenger') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="col-md-3 form-group mb-2">
                    <label for="suitcase"><strong>Suitcase</strong></label>
                    <input type="number" class="form-control" wire:model.defer="suitcase" id="suitcase">
                    @error('suitcase') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>

            <h6 class="text-center mt-4"><u>Contact Information</u></h6>
            <div class="row">
                <div class="col-md-6 form-group mb-2">
                    <label for="first_name"><strong>First Name</strong></label>
                    <input type="text" class="form-control" wire:model.defer="first_name" id="first_name">
                    @error('first_name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="col-md-6 form-group mb-2">
                    <label for="last_name"><strong>Last Name</strong></label>
                    <input type="text" class="form-control" wire:model.defer="last_name" id="last_name">
                    @error('last_name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group col-md-6 mb-2">
                    <label for="email"><strong>Email</strong></label>
                    <input type="email" class="form-control" wire:model.defer="email" id="email">
                    @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group col-md-6 mb-2">
                    <label for="phone"><strong>Phone</strong></label>
                    <input type="phone" class="form-control" wire:model.defer="phone" id="phone">
                    @error('phone') <span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group mb-2">
                    <label for="name"><strong>Comments</strong></label>
                    <textarea class="form-control" wire:model.defer="comments" id="comments" cols="30"
                        rows="5"></textarea>
                    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <a href="{{route('admin.bookings')}}" class="m-1 float-end btn btn-secondary">Back</a>

                    <button type="button" wire:click.prevent="cancel()" class="m-1 float-end btn btn-danger"
                        data-bs-dismiss="model">Cancel</button>

                    @if ($updateMode)
                    <button type="button" wire:click.prevent="update()" class="m-1 float-end btn btn-primary">Save
                        & Update</button>
                    @else
                    <button type="button" wire:click.prevent="store()" class="m-1 float-end btn btn-primary">Save &
                        Submit</button>
                    @endif
                </div>
            </div>
        </form>
    </div>

    <div wire:loading wire:target="store,cancel">
        <div class="lds-roller">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="modal-backdrop show backStyle"></div>
    </div>
</div>
