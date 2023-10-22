<div class="container">

    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    @can('coupon-create')
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-success float-end my-1" data-bs-toggle="modal"
                data-bs-target="#coupon_modal"><i class="bi bi-plus-lg me-1"></i>Add Coupon
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
                    <th>Type</th>
                    <th>Value</th>
                    <th>Status</th>
                    <th width="150px">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($coupons as $coupon)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $coupon->name }}</td>
                    <td>{{ $coupon->type }}</td>
                    <td>{{ $coupon->value }}</td>
                    <td class="text-capitalize">
                        <span class="badge text-bg-{{$coupon->status ? 'success' : 'danger'}}">
                            {{ $coupon->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        @can('coupon-edit')
                        <button wire:click="edit({{ $coupon->id }})" class="btn btn-primary btn-sm my-1"
                            data-bs-toggle="modal" data-bs-target="#coupon_modal">
                            <i class="bi bi-pencil-square me-1"></i>Edit</button>
                        @endcan

                        @can('coupon-delete')
                        <button onclick="deleteConfirmation('delete-coupon','{{$coupon->id}}')"
                            class="btn btn-danger btn-sm my-1">
                            <i class="bi bi-trash me-1"></i>Delete</button>
                        @endcan
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">There are no coupons added yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-lg-6">
            Showing {{ $coupons->firstItem() ? $coupons->firstItem() : 0 }} to {{ $coupons->lastItem() ?
            $coupons->lastItem() : 0}} of total
            {{ $coupons->total() }} entries
        </div>
        <div class="col-lg-6">
            <div class="d-flex justify-content-end px-2 mx-2 my-2">
                {{ $coupons->links() }}
            </div>
        </div>
    </div>

    @can('coupon-edit')
    @include('livewire.coupons.update')
    @endcan

    @include('livewire.loader')

</div>
