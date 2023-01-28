<div wire:ignore.self class="modal fade" id="assign_driver_modal" tabindex="-1" role="dialog"
    aria-labelledby="assign_driver_label" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assign_driver_label">Assign Driver</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <select wire:model.defer="driver_id" class="form-select">
                            <option value="" selected>--Select Driver--</option>
                            @foreach ($drivers as $driver)
                            <option value="{{$driver->id}}">{{$driver->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="button" wire:click.prevent="assignDriver({{$booking->id}})"
                    class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>
