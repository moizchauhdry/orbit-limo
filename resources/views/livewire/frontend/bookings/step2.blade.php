@if ($current_step == 2)
<div class="chbs-main-content-step-2">
    <div class="chbs-layout-25x75 chbs-clear-fix">
        <div class="chbs-layout-column-left">
            <div class="theiaStickySidebar">
                <div class="chbs-summary">
                    <div class="chbs-summary-header">
                        <h4>Summary</h4>
                    </div>
                    <div class="chbs-summary-field">
                        <div class="chbs-summary-field-name">Service type</div>
                        <div class="chbs-summary-field-value">Distance</div>
                    </div>
                    <div class="chbs-summary-field">
                        <div class="chbs-summary-field-name">Transfer type</div>
                        <div class="chbs-summary-field-value">One Way</div>
                    </div>
                    <div class="chbs-summary-field">
                        <div class="chbs-summary-field-name">Pickup location</div>
                        <div class="chbs-summary-field-value">{{$pickup_location}}</div>
                    </div>
                    <div class="chbs-summary-field">
                        <div class="chbs-summary-field-name">Drop off location</div>
                        <div class="chbs-summary-field-value">{{$drop_location}}</div>
                    </div>
                    <div class="chbs-summary-field">
                        <div class="chbs-summary-field-name">Pickup date, time</div>
                        <div class="chbs-summary-field-value">{{$pickup_date}}, {{$pickup_time}}</div>
                    </div>
                    <div class="chbs-summary-field">
                        <div class="chbs-summary-field-name">Extra time</div>
                        <div class="chbs-summary-field-value">1 hours</div>
                    </div>
                    <div class="chbs-summary-field">
                        <div class="chbs-layout-50x50 chbs-clear-fix">
                            <div class="chbs-layout-column-left">
                                <div class="chbs-summary-field-name">Total distance</div>
                                <div class="chbs-summary-field-value">{{$total_distance}}</div>
                            </div>
                            <div class="chbs-layout-column-right">
                                <div class="chbs-summary-field-name">Total time</div>
                                <div class="chbs-summary-field-value">{{$total_time}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chbs-summary-price-element">
                    <div class="chbs-summary-price-element-total">
                        <span>Total</span>
                        <span>${{$subtotal ?? 0}}</span>
                    </div>
                    <div class="chbs-summary-price-element-pay">
                        <span>To pay <span>(30% deposit)</span></span>
                        <span>${{$grand_total ?? 0}}</span>
                    </div>
                </div>
                <div class="resize-sensor"
                    style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
                    <div class="resize-sensor-expand"
                        style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                        <div
                            style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 285px; height: 830px;">
                        </div>
                    </div>
                    <div class="resize-sensor-shrink"
                        style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                        <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="chbs-layout-column-right">
            <div class="chbs-vehicle-filter chbs-box-shadow chbs-clear-fix">
                <label class="chbs-form-label-group">Vehicles filter</label>
                <div class="chbs-form-field chbs-form-field-width-33" style="cursor: pointer;">
                    <label class="chbs-form-field-label">
                        Passengers <span class="chbs-tooltip chbs-meta-icon-question" data-hasqtip="35"
                            oldtitle="Number of Passengers." title=""></span>
                    </label>
                    <select name="chbs_vehicle_passenger_count" id="ui-id-44">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    {{-- <span class="ui-selectmenu-button ui-widget ui-state-default ui-corner-all" tabindex="0"
                        id="ui-id-44-button" role="combobox" aria-expanded="false" aria-autocomplete="list"
                        aria-owns="ui-id-44-menu" aria-haspopup="true" style="width: 77px;"><span
                            class="chbs-meta-icon-arrow-vertical-large"></span><span
                            class="ui-selectmenu-text">1</span></span> --}}
                </div>
                <div class="chbs-form-field chbs-form-field-width-33" style="cursor: pointer;">
                    <label>
                        Suitcases <span class="chbs-tooltip chbs-meta-icon-question" data-hasqtip="36"
                            oldtitle="Number of Suitcases." title=""></span>
                    </label>
                    <select name="chbs_vehicle_bag_count" id="ui-id-12">
                        <option value="1" selected="selected">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    {{-- <span class="ui-selectmenu-button ui-widget ui-state-default ui-corner-all" tabindex="0"
                        id="ui-id-12-button" role="combobox" aria-expanded="false" aria-autocomplete="list"
                        aria-owns="ui-id-12-menu" aria-haspopup="true" style="width: 0px;"><span
                            class="chbs-meta-icon-arrow-vertical-large"></span><span
                            class="ui-selectmenu-text">1</span></span> --}}
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
                    {{-- <span class="ui-selectmenu-button ui-widget ui-state-default ui-corner-all" tabindex="0"
                        id="ui-id-13-button" role="combobox" aria-expanded="false" aria-autocomplete="list"
                        aria-owns="ui-id-13-menu" aria-haspopup="true" style="width: 0px;"><span
                            class="chbs-meta-icon-arrow-vertical-large"></span><span class="ui-selectmenu-text">- All
                            vehicles -</span></span> --}}
                </div>
            </div>
            <div class="chbs-vehicle-list">
                <ul class="chbs-list-reset">
                    @foreach ($vehicles as $vehicle)
                    <li>
                        <div class="chbs-vehicle chbs-clear-fix" data-id="10111" data-base_location_cooridnate_lat=""
                            data-base_location_cooridnate_lng="">
                            <div class="chbs-vehicle-image" style="opacity: 1;"><img
                                    src="https://quanticalabs.com/wp_plugins/chauffeur-booking-system/files/2017/11/image_11.jpg"
                                    alt="">
                            </div>
                            <div class="chbs-vehicle-content">
                                <div class="chbs-vehicle-content-header">
                                    <span>{{$vehicle->name}}</span>
                                    <button wire:click="selectVehicle({{$vehicle->id}})" type="button"
                                        class="chbs-button chbs-button-style-1">
                                        Select
                                        <span class="chbs-meta-icon-tick"></span>
                                    </button>
                                </div>
                                <div class="chbs-vehicle-content-price">
                                    <span>
                                        <span>${{$vehicle->ptp_min_amount}}</span>
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
                                                <span class="chbs-circle">7</span>
                                                <span class="chbs-meta-icon-bag"></span>
                                                <span class="chbs-circle">6</span>
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
                                @foreach ($extras as $extra)
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
                                                    data-step="-1"></span>
                                                <input type="text" wire:model.defer="booking_extra_qty" value="1"
                                                    data-quantity-max="2">
                                                <span class="chbs-quantity-section-button chbs-meta-icon-plus"
                                                    data-step="1"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chbs-column-3">
                                        <button type="button" class="chbs-button chbs-button-style-1"
                                            wire:click="selectBookingExtra({{$extra->id}})">Select
                                            <span class="chbs-meta-icon-tick"></span>
                                        </button>
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
