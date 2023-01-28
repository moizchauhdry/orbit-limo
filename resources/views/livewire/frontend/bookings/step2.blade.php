@if ($current_step == 2)
<div class="chbs-main-content-step-2">
    <div class="row">
        <div class="col-md-3">
            @include('livewire.frontend.bookings.summary-bar')
        </div>
        <div class="col-md-9">
            <div class="chbs-vehicle-filter chbs-box-shadow chbs-clear-fix">
                <label class="chbs-form-label-group">Vehicles filter</label>
                <div class="chbs-form-field chbs-form-field-width-33" style="cursor: pointer;">
                    <label class="chbs-form-field-label">
                        Passengers <span class="chbs-tooltip chbs-meta-icon-question" data-hasqtip="35"
                            oldtitle="Number of Passengers." title=""></span>
                    </label>
                    <select wire:model.defer="passenger">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="chbs-form-field chbs-form-field-width-33" style="cursor: pointer;">
                    <label>Suitcases <span class="chbs-tooltip chbs-meta-icon-question" data-hasqtip="36"
                            oldtitle="Number of Suitcases." title=""></span>
                    </label>
                    <select wire:model.defer="suitcase">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="chbs-form-field chbs-form-field-width-33" style="cursor: pointer;">
                    <label>
                        Type <span class="chbs-tooltip chbs-meta-icon-question" data-hasqtip="37"
                            oldtitle="Vehicle Type." title=""></span>
                    </label>
                    <select name="chbs_vehicle_category" id="ui-id-13" disabled>
                        <option value="0">- All vehicles -</option>
                        <option value="1">Sedan</option>
                        <option value="2">SUV</option>
                    </select>
                </div>
            </div>
            <div class="chbs-vehicle-list">
                <ul class="chbs-list-reset">
                    @foreach ($vehicles as $vehicle)
                    <li>
                        <div class="chbs-vehicle chbs-clear-fix">
                            <div class="chbs-vehicle-image" style="opacity: 1;"><img
                                    src="{{asset('storage/'.$vehicle->image)}}" alt="">
                            </div>
                            <div class="chbs-vehicle-content row">
                                <div class="chbs-vehicle-content-header">
                                    <span>{{$vehicle->name}}</span>
                                    <button wire:click="selectVehicle({{$vehicle->id}})" type="button"
                                        class="chbs-button {{$vehicle->id == $vehicle_id ? 'chbs-button-style-1' : 'chbs-button-style-2'}}">
                                        @if ($vehicle->id == $vehicle_id)
                                        Selected <i class="bi bi-check-circle ms-1"></i>
                                        @else Select @endif
                                    </button>
                                </div>
                                <div class="chbs-vehicle-content-price">
                                    <span>
                                        <span>${{calculateVehicleAmount($vehicle->id,$service_type,
                                            $total_distance,$duration_in_hours)}}</span>
                                    </span>
                                </div>
                                <div class="chbs-vehicle-content-meta">
                                    <div>
                                        <span class="chbs-show-more-button">
                                            <a href="#" class="">
                                                <span class="chbs-circle chbs-meta-icon-arrow-vertical-small"></span>
                                                <span>More info</span>
                                            </a>
                                        </span>
                                        <div class="chbs-vehicle-content-meta-info">
                                            <div>
                                                <span class="chbs-meta-icon-people"></span>
                                                <span class="chbs-circle">{{$vehicle->passenger}}</span>
                                                <span class="chbs-meta-icon-bag"></span>
                                                <span class="chbs-circle">{{$vehicle->suitcase}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="chbs-booking-extra">
                    <h4 class="chbs-booking-extra-header">
                        <span class="chbs-circle chbs-meta-icon-cart"></span>
                        <span>Extra options</span>
                    </h4>
                    <div class="chbs-state-open">
                        <div class="chbs-booking-extra-list">
                            <ul class="chbs-list-reset">
                                @foreach ($extras as $key => $extra)
                                <li class="chbs-booking-extra-list-item-quantity-enable">
                                    <div class="chbs-column-1">
                                        <div class="chbs-column-1-right">
                                            <span class="chbs-booking-form-extra-name">
                                                {{$extra->name}}
                                            </span>
                                            <span class="chbs-booking-form-extra-price">
                                                ${{$extra->price}}
                                            </span>
                                            <span class="chbs-booking-form-extra-description">
                                                Baby car seat for children aged 0-36 months
                                            </span>
                                        </div>
                                    </div>
                                    <div class="chbs-column-2">
                                        <div class="chbs-form-field">
                                            <label>Quantity</label>
                                            <div class="chbs-quantity-section">
                                                <span class="chbs-quantity-section-button chbs-meta-icon-minus"
                                                    wire:click="cartDecrement({{$key}})"></span>
                                                <input type="hidden" wire:model.defer="booking_extra_id.{{$key}}">
                                                <input type="text" wire:model.defer="booking_extra_qty.{{$key}}">
                                                <span class="chbs-quantity-section-button chbs-meta-icon-plus"
                                                    wire:click="cartIncrement({{$key}})"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chbs-column-3">
                                        @if ($booking_extra_qty[$key] > 0)
                                        <button type="button" class="chbs-button chbs-button-style-1">
                                            Selected <i class="bi bi-check-circle ms-1"></i></button>
                                        @else
                                        <button type="button" class="chbs-button chbs-button-style-2"
                                            wire:click="cartIncrement({{$key}})">Select</button>
                                        @endif
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="chbs-clear-fix chbs-main-content-navigation-button" style="margin-top: 20px;">
    <button wire:click="back(1)" type="button" class="chbs-button chbs-button-style-2 chbs-button-step-prev">
        <span class="chbs-meta-icon-arrow-horizontal-large"></span>
        Choose ride details </button>
    <button wire:click="submitStep2" type="button" class="chbs-button chbs-button-style-1 chbs-button-step-next">
        Enter contact details <span class="chbs-meta-icon-arrow-horizontal-large"></span>
    </button>
</div>
@endif
