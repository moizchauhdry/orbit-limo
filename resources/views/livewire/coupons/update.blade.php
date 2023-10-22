<div wire:ignore.self class="modal fade" id="coupon_modal" tabindex="-1" role="dialog"
    aria-labelledby="coupon_modal_label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="coupon_modal_label">{{$updateMode ? 'Edit' : 'Create'}} Coupon</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-floating mb-2">
                        <input type="hidden" wire:model="user_id">
                        <input type="text" class="form-control" wire:model="name" id="name" placeholder="Enter Name">
                        <label for="name">Name</label>
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-floating mb-2">
                        <select wire:model.defer="type" class="form-select" id="type"
                            aria-label="Floating label select example">
                            <option value="">Select</option>
                            <option value="fixed">Fixed</option>
                            <option value="percentage">Percentage</option>
                        </select>
                        <label for="type">Type</label>
                        @error('type') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" wire:model="value" id="value" placeholder="Enter value">
                        <label for="value">Value</label>
                        @error('value') <span class="text-danger">{{ $message }}</span>@enderror
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
