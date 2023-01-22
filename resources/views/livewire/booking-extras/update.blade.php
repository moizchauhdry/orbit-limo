<div wire:ignore.self class="modal fade" id="booking_extra_modal" tabindex="-1" role="dialog"
    aria-labelledby="booking_extra_modal_label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="booking_extra_modal_label">{{$updateMode ? 'Edit' : 'Create'}} Booking Extra
                </h5>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="user_id">
                    <div class="form-group mb-2">
                        <label for="name"><strong>Name</strong></label>
                        <input type="text" class="form-control" wire:model.defer="name" id="name">
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="price"><strong>Price</strong></label>
                        <input type="text" class="form-control" wire:model.defer="price" id="price">
                        @error('price') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="desc"><strong>Description</strong></label>
                        <textarea wire:model.defer="desc" class="form-control" name="desc" id="desc" cols="30"
                            rows="5"></textarea>
                        @error('desc') <span class="text-danger">{{ $message }}</span>@enderror
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
