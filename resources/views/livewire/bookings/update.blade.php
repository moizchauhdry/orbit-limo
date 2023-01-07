<div wire:ignore.self class="modal fade" id="booking_modal" tabindex="-1" role="dialog"
    aria-labelledby="booking_modal_label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="booking_modal_label">{{$updateMode ? 'Edit' : 'Create'}} Booking</h5>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="user_id">

                    <h5 class="text-center"><u>Ride Information</u></h5>
                    <div class="row">
                        <div class="col-md-6 form-group mb-2">
                            <label for="pickup_date"><strong>Pickup Date</strong></label>
                            <input type="text" class="form-control" wire:model="pickup_date" id="pickup_date">
                            @error('pickup_date') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label for="pickup_time"><strong>Pickup Time</strong></label>
                            <input type="text" class="form-control" wire:model="pickup_time" id="pickup_time">
                            @error('pickup_time') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label for="pickup_location"><strong>Pickup Location</strong></label>
                            <input type="text" class="form-control" wire:model="pickup_location" id="pickup_location">
                            @error('pickup_location') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label for="drop_location"><strong>Drop-off Location</strong></label>
                            <input type="text" class="form-control" wire:model="drop_location" id="drop_location">
                            @error('drop_location') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label for="total_distance"><strong>Total Distance</strong></label>
                            <input type="text" class="form-control" wire:model="total_distance" id="total_distance">
                            @error('total_distance') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label for="total_time"><strong>Total Time</strong></label>
                            <input type="text" class="form-control" wire:model="total_time" id="total_time">
                            @error('total_time') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <h5 class="text-center"><u>Vehicle Information</u></h5>
                    <div class="row">
                        <div class="form-group col-md-6 mb-2">
                            <label for="vehicle_id"><strong>Vehicle</strong></label>
                            <select wire:model.defer="vehicle_id" class="form-select" id="vehicle_id"
                                aria-label="Floating label select example">
                                <option value="1">Sedan</option>
                                <option value="2">SUV</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group mb-2">
                            <label for="passenger"><strong>Passenger</strong></label>
                            <input type="number" class="form-control" wire:model="passenger" id="passenger">
                            @error('passenger') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-3 form-group mb-2">
                            <label for="suitcase"><strong>Suitcase</strong></label>
                            <input type="number" class="form-control" wire:model="suitcase" id="suitcase">
                            @error('suitcase') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <h5 class="text-center"><u>Contact Information</u></h5>
                    <div class="row">
                        <div class="col-md-6 form-group mb-2">
                            <label for="first_name"><strong>First Name</strong></label>
                            <input type="text" class="form-control" wire:model="first_name" id="first_name">
                            @error('first_name') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="col-md-6 form-group mb-2">
                            <label for="last_name"><strong>Last Name</strong></label>
                            <input type="text" class="form-control" wire:model="last_name" id="last_name">
                            @error('last_name') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group col-md-6 mb-2">
                            <label for="email"><strong>Email</strong></label>
                            <input type="email" class="form-control" wire:model="email" id="email">
                            @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group col-md-6 mb-2">
                            <label for="phone"><strong>Phone</strong></label>
                            <input type="phone" class="form-control" wire:model="phone" id="phone">
                            @error('phone') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="name"><strong>Comments</strong></label>
                            <textarea wire:model="comments" class="form-control" name="comments" id="comments" cols="30"
                                rows="5"></textarea>
                            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-danger"
                    data-bs-dismiss="modal">Cancel</button>
                @if ($updateMode)
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save
                    & Update</button>
                @else
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save &
                    Submit</button>
                @endif
            </div>
        </div>
    </div>
</div>
