@if ($current_step == 1)
<div class="chbs-main-content-step-1">
    <div class="chbs-layout-50x50 chbs-clear-fix">
        <div class="chbs-layout-column-left">
            <div class="chbs-tab chbs-box-shadow">
                {{-- <ul>
                    <li data-id="1"><a href="#panel-1">Distance</a></li>
                    <li data-id="2"><a href="#panel-2">Hourly</a></li>
                </ul> --}}
                <div id="panel-1">
                    <label class="chbs-form-label-group">Ride details</label>
                    <div class="chbs-clear-fix chbs-form-field-pickup-date-time">
                        <div class="chbs-form-field chbs-form-field-width-50">
                            <label class="chbs-form-field-label">
                                Pickup date <span class="chbs-tooltip chbs-meta-icon-question"
                                    title="The date when your journey will start."></span>
                            </label>
                            <input wire:model.defer="pickup_date" type="date" class="chbs-datepicker">
                        </div>
                        <div class="chbs-form-field chbs-form-field-width-50">
                            <label>
                                Pickup time <span class="chbs-tooltip chbs-meta-icon-question"
                                    title="The time when your journey will start."></span>
                            </label>
                            <input wire:model.defer="pickup_time" type="time" class="chbs-timepicker">
                        </div>
                    </div>
                    {{-- <div
                        class="chbs-form-field chbs-form-field-location-autocomplete chbs-form-field-location-switch chbs-hidden">
                        <label>Waypoint</label>
                        <span class="chbs-meta-icon-2 chbs-meta-icon-2-location-1"></span>
                        <input type="text" autocomplete="off" name="chbs_waypoint_location_service_type_1[]">
                        <input type="hidden" name="chbs_waypoint_location_coordinate_service_type_1[]">
                        <span class="chbs-location-add chbs-meta-icon-plus"></span>
                        <span class="chbs-location-remove chbs-meta-icon-minus"></span>
                    </div> --}}
                    <div class="chbs-form-field chbs-form-field-location-autocomplete chbs-form-field-location-switch"
                        data-label-waypoint="Waypoint">
                        <label>
                            Pickup location <span class="chbs-my-location-link">&nbsp;&nbsp;-&nbsp;&nbsp;<a href="#">Use
                                    my location</a></span>
                            <span class="chbs-tooltip chbs-meta-icon-question"
                                title="The address where your journey will start."></span>
                        </label>
                        <input type="text" wire:model.defer="pickup_location">
                        {{-- <span class="chbs-location-add chbs-meta-icon-plus"></span> --}}
                    </div>
                    <div class="chbs-form-field chbs-form-field-location-autocomplete">
                        <label>
                            Drop-off location <span class="chbs-tooltip chbs-meta-icon-question"
                                title="The address where your journey will end."></span>
                        </label>
                        <input type="text" wire:model.defer="drop_location">
                    </div>

                    <label class="chbs-form-label-group">Extra options</label>
                    <div class="chbs-form-field chbs-form-field-extra-time">
                        <label>
                            Extra time <span class="chbs-tooltip chbs-meta-icon-question"
                                title="Extra time included to the journey."></span>
                        </label>
                        <select name="chbs_extra_time_service_type_1">
                            <option value="0">0 hour(s)</option>
                            <option value="1">1 hour(s)</option>
                            <option value="2">2 hour(s)</option>
                            <option value="3">3 hour(s)</option>
                            <option value="4">4 hour(s)</option>
                            <option value="5">5 hour(s)</option>
                            <option value="6">6 hour(s)</option>
                            <option value="7">7 hour(s)</option>
                            <option value="8">8 hour(s)</option>
                            <option value="9">9 hour(s)</option>
                            <option value="10">10 hour(s)</option>
                            <option value="11">11 hour(s)</option>
                            <option value="12">12 hour(s)</option>
                        </select>
                    </div>
                </div>
                {{-- <div id="panel-2">
                    <label class="chbs-form-label-group">Ride details</label>
                    <div class="chbs-clear-fix chbs-form-field-pickup-date-time">
                        <div class="chbs-form-field chbs-form-field-width-50">
                            <label class="chbs-form-field-label">
                                Pickup date <span class="chbs-tooltip chbs-meta-icon-question"
                                    title="The date when your journey will start."></span>
                            </label>
                            <input type="text" autocomplete="off" name="chbs_pickup_date_service_type_2"
                                class="chbs-datepicker" value="">
                        </div>
                        <div class="chbs-form-field chbs-form-field-width-50">
                            <label>
                                Pickup time <span class="chbs-tooltip chbs-meta-icon-question"
                                    title="The time when your journey will start."></span>
                            </label>
                            <input type="text" autocomplete="off" name="chbs_pickup_time_service_type_2"
                                class="chbs-timepicker" value="">
                        </div>
                    </div>
                    <div class="chbs-form-field chbs-form-field-location-autocomplete">
                        <label>
                            Pickup location <span class="chbs-my-location-link">&nbsp;&nbsp;-&nbsp;&nbsp;<a href="#">Use
                                    my location</a></span>
                            <span class="chbs-tooltip chbs-meta-icon-question"
                                title="The address where your journey will start."></span>
                        </label>
                        <input type="text" autocomplete="off" name="chbs_pickup_location_service_type_2" value="">
                        <input type="hidden" name="chbs_pickup_location_coordinate_service_type_2" value="">
                    </div>
                    <div class="chbs-form-field">
                        <label>
                            Duration (in hours) <span class="chbs-tooltip chbs-meta-icon-question"
                                title="Duration of the journey."></span>
                        </label>
                        <select name="chbs_duration_service_type_2">
                            <option value="1">1 hour(s)</option>
                            <option value="2">2 hour(s)</option>
                            <option value="3">3 hour(s)</option>
                            <option value="4">4 hour(s)</option>
                            <option value="5">5 hour(s)</option>
                            <option value="6">6 hour(s)</option>
                            <option value="7">7 hour(s)</option>
                            <option value="8">8 hour(s)</option>
                            <option value="9">9 hour(s)</option>
                            <option value="10">10 hour(s)</option>
                            <option value="11">11 hour(s)</option>
                            <option value="12">12 hour(s)</option>
                            <option value="13">13 hour(s)</option>
                            <option value="14">14 hour(s)</option>
                            <option value="15">15 hour(s)</option>
                            <option value="16">16 hour(s)</option>
                            <option value="17">17 hour(s)</option>
                            <option value="18">18 hour(s)</option>
                            <option value="19">19 hour(s)</option>
                            <option value="20">20 hour(s)</option>
                            <option value="21">21 hour(s)</option>
                            <option value="22">22 hour(s)</option>
                            <option value="23">23 hour(s)</option>
                            <option value="24">24 hour(s)</option>
                        </select>
                    </div>
                    <label class="chbs-form-label-group">Extra options</label>
                    <div class="chbs-form-field chbs-form-field-location-autocomplete">
                        <label>
                            Drop-off location <span class="chbs-tooltip chbs-meta-icon-question"
                                title="The address where your journey will end."></span>
                        </label>
                        <input type="text" autocomplete="off" name="chbs_dropoff_location_service_type_2" value="">
                        <input type="hidden" name="chbs_dropoff_location_coordinate_service_type_2" value="">
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="chbs-layout-column-right">
            <div class="chbs-google-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26361583.702499364!2d-113.76176406825141!3d36.24030141306171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2s!4v1673883383006!5m2!1sen!2s"
                    width="590" height="390" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="chbs-ride-info chbs-box-shadow">
                <div>
                    <span class="chbs-meta-icon-route"></span>
                    <span>Total distance</span>
                    <span>
                        <span>0</span>
                        <span>km</span>
                    </span>
                </div>
                <div>
                    <span class="chbs-meta-icon-clock"></span>
                    <span>Total time</span>
                    <span>
                        <span>0</span>
                        <span>h</span>
                        <span>0</span>
                        <span>m</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="chbs-clear-fix chbs-main-content-navigation-button">
        <button wire:click="submitStep1" type="button" class="chbs-button chbs-button-style-1 chbs-button-step-next">
            Choose a vehicle <span class="chbs-meta-icon-arrow-horizontal-large"></span>
        </button>
    </div>
</div>
@endif
