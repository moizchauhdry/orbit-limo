<div wire:ignore.self class="modal fade" id="vehicle_modal" tabindex="-1" role="dialog"
    aria-labelledby="vehicle_modal_label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="vehicle_modal_label">{{$updateMode ? 'Edit' : 'Create'}} Driver</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-floating mb-2">
                        <input type="hidden" wire:model="user_id">
                        <input type="text" class="form-control" wire:model="name" id="name" placeholder="Enter Name">
                        <label for="name">Name</label>
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
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
