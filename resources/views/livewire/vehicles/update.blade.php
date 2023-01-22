<div wire:ignore.self class="modal fade" id="vehicle_modal" tabindex="-1" role="dialog"
    aria-labelledby="vehicle_modal_label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vehicle_modal_label">{{$updateMode ? 'Edit' : 'Create'}} Vehicle</h5>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="user_id">
                    <h5 class="text-center"><strong><u>Basic Information</u></strong></h5>
                    <div class="row">
                        <div class="col-md-6 form-group mb-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" wire:model="name" id="name">
                            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label for="photo">Image</label>
                            <input type="file" class="form-control" wire:model="image" id="image">

                            {{-- @if ($image)
                            <div class="m-2">
                                <img src="{{ $image->temporaryUrl() }}" class="img-preview">
                            </div>
                            @endif --}}
                            @error('image') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <h5 class="text-center"><strong><u>Point To Point</u></strong></h5>
                    <div class="row">
                        <div class="col-md-6 form-group mb-2">
                            <label for="ptp_min_amount">Minimum Amount</label>
                            <input type="number" class="form-control" wire:model="ptp_min_amount" id="ptp_min_amount">
                            @error('ptp_min_amount') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label for="ptp_min_distance">Minimum Distance</label>
                            <input type="number" class="form-control" wire:model="ptp_min_distance"
                                id="ptp_min_distance">
                            @error('ptp_min_distance') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label for="ptp_adt_amount_per_km">Additonal Amount Per KM</label>
                            <input type="number" class="form-control" wire:model="ptp_adt_amount_per_km"
                                id="ptp_adt_amount_per_km">
                            @error('ptp_adt_amount_per_km') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label for="ptp_amount_peak_hrs">Peak Hours Amount</label>
                            <input type="number" class="form-control" wire:model="ptp_amount_peak_hrs"
                                id="ptp_amount_peak_hrs">
                            @error('ptp_amount_peak_hrs') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label for="ptp_peak_hrs">Peak Hours</label>
                            <input type="text" class="form-control" wire:model="ptp_peak_hrs" id="ptp_peak_hrs">
                            @error('ptp_peak_hrs') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label for="ptp_amount_per_stop">Amount Per Stop</label>
                            <input type="number" class="form-control" wire:model="ptp_amount_per_stop"
                                id="ptp_amount_per_stop">
                            @error('ptp_amount_per_stop') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <h5 class="text-center"><strong><u>Hourly Details</u></strong></h5>
                    <div class="row">
                        <div class="col-md-6 form-group mb-2">
                            <label for="hrly_min_amount">Minimum Amount</label>
                            <input type="number" class="form-control" wire:model="hrly_min_amount" id="hrly_min_amount">
                            @error('hrly_min_amount') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label for="hrly_min_hour">Minimum Hour</label>
                            <input type="number" class="form-control" wire:model="hrly_min_hour" id="hrly_min_hour">
                            @error('hrly_min_hour') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label for="hrly_adt_amount_per_hour">Additional Amount Per Hour</label>
                            <input type="number" class="form-control" wire:model="hrly_adt_amount_per_hour"
                                id="hrly_adt_amount_per_hour">
                            @error('hrly_adt_amount_per_hour') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label for="hrly_amount_per_km_allowed">Amount Allowed Per KM</label>
                            <input type="number" class="form-control" wire:model="hrly_amount_per_km_allowed"
                                id="hrly_amount_per_km_allowed">
                            @error('hrly_amount_per_km_allowed') <span class="text-danger">{{ $message
                                }}</span>@enderror
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
