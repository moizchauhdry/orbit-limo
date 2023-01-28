@if ($current_step == 4)
<div class="chbs-main-content-step-4 container">
    <div class="chbs-layout-33x33x33 row">
        <div class="col-md-4">
            <div class="chbs-summary">
                <div class="chbs-summary-header">
                    <h4>Contact &amp; Billing Info</h4>
                    <a href="#" data-step="3">Edit</a>
                </div>
                <div class="chbs-summary-field">
                    <div class="chbs-layout-50x50 chbs-clear-fix">
                        <div class="chbs-layout-column-left">
                            <div class="chbs-summary-field-name">First name</div>
                            <div class="chbs-summary-field-value">{{$first_name}}</div>
                        </div>
                        <div class="chbs-layout-column-right">
                            <div class="chbs-summary-field-name">Last name</div>
                            <div class="chbs-summary-field-value">{{$last_name}}</div>
                        </div>
                    </div>
                </div>
                <div class="chbs-summary-field">
                    <div class="chbs-summary-field-name">E-mail address</div>
                    <div class="chbs-summary-field-value">{{$email}}</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div></div>
            <div class="chbs-summary">
                <div class="chbs-summary-header">
                    <h4>Ride details</h4>
                    <a href="#" data-step="1">Edit</a>
                </div>
                @include('livewire.frontend.bookings.summary-ride-element')
            </div>
        </div>
        <div class="col-md-4">
            <div><img src="{{asset('storage/'.getVehicle($vehicle_id)['image'])}}" alt=""></div>
            <div class="chbs-summary">
                <div class="chbs-summary-header">
                    <h4>Vehicle info</h4>
                    <a href="#" data-step="2">Edit</a>
                </div>
                <div class="chbs-summary-field">
                    <div class="chbs-summary-field-name">Vehicle</div>
                    <div class="chbs-summary-field-value">{{getVehicle($vehicle_id)['name']}}</div>
                </div>
            </div>
            {{-- <div class="chbs-clear-fix chbs-coupon-code-section">
                <div class="chbs-form-field">
                    <label>Do you have a discount code?</label>
                    <input maxlength="12" name="chbs_coupon_code" value="" type="text">
                </div>
                <a href="#" class="chbs-button chbs-button-style-2">
                    Apply code
                    <span class="chbs-meta-icon-arrow-horizontal"></span>
                </a>
            </div> --}}
            <div class="chbs-summary-price-element">
                @include('livewire.frontend.bookings.summary-price-element')
            </div>
        </div>
    </div>
</div>

<div class="chbs-clear-fix chbs-main-content-navigation-button" style="margin-top: 20px;">
    <button wire:click="back(3)" type="button" class="chbs-button chbs-button-style-2 chbs-button-step-prev">
        <span class="chbs-meta-icon-arrow-horizontal-large"></span>
        Enter Contact Details </button>
    <button wire:click="submitStep4" type="button" class="chbs-button chbs-button-style-1 chbs-button-step-next">
        Book Now <span class="chbs-meta-icon-arrow-horizontal-large"></span>
    </button>
</div>
@endif
