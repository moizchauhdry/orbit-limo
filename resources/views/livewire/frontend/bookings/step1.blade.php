@if ($current_step == 1)
<div class="chbs-main-content-step-1">
    <div class="row">
        <div class="col-md-6">
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
                        <input type="text" wire:model.defer="pickup_location" id="origin-input">
                        {{-- <span class="chbs-location-add chbs-meta-icon-plus"></span> --}}
                    </div>
                    <div class="chbs-form-field chbs-form-field-location-autocomplete">
                        <label>
                            Drop-off location <span class="chbs-tooltip chbs-meta-icon-question"
                                title="The address where your journey will end."></span>
                        </label>
                        <input type="text" wire:model.defer="drop_location" id="destination-input">
                    </div>

                    <label class="chbs-form-label-group">Extra options</label>
                    <div class="chbs-form-field chbs-form-field-extra-time">
                        <label>
                            Extra time <span class="chbs-tooltip chbs-meta-icon-question"
                                title="Extra time included to the journey."></span>
                        </label>
                        <select name="chbs_extra_time_service_type_1">
                            <option value="" selected>-Select Hour-</option>
                            <option value="1">1 Hour</option>
                            <option value="2">2 Hours</option>
                            <option value="3">3 Hours</option>
                            <option value="4">4 Hours</option>
                            <option value="5">5 Hours</option>
                            <option value="6">6 Hours</option>
                            <option value="7">7 Hours</option>
                            <option value="8">8 Hours</option>
                            <option value="9">9 Hours</option>
                            <option value="10">10 Hours</option>
                            <option value="11">11 Hours</option>
                            <option value="12">12 Hours</option>
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
        <div class="col-md-6">
            <div class="chbs-google-map" wire:ignore>
                <div style="display: none">
                    <div id="mode-selector" class="controls">
                        <input type="radio" name="type" id="changemode-driving" checked="checked" />
                        <label for="changemode-driving">Driving</label>
                    </div>
                </div>
                <div id="map"></div>
            </div>
            <div class="chbs-ride-info chbs-box-shadow">
                <div>
                    <span class="chbs-meta-icon-route"></span>
                    <span>Total distance</span>
                    <span style="font-size: 18px">{{$total_distance?? '0 Km'}}</span>
                </div>
                <div>
                    <span class="chbs-meta-icon-clock"></span>
                    <span>Total time</span>
                    <span style="font-size: 18px">{{$total_time ?? '0 h'}}</span>
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

@push('js')
<style>
    #map {
        height: 500px;
        width: 100%
    }
</style>

<script>
    function initMap() {
                const map = new google.maps.Map(document.getElementById("map"), {
                    mapTypeControl: false,
                    center: { lat: -33.8688, lng: 151.2195 },
                    zoom: 13,
                });

                new AutocompleteDirectionsHandler(map);
            }

            class AutocompleteDirectionsHandler {
                map;
                originPlaceId;
                destinationPlaceId;
                travelMode;
                directionsService;
                directionsRenderer;
                constructor(map) {
                    this.map = map;
                    this.originPlaceId = "";
                    this.destinationPlaceId = "";
                    this.travelMode = google.maps.TravelMode.DRIVING;
                    this.directionsService = new google.maps.DirectionsService();
                    this.directionsRenderer = new google.maps.DirectionsRenderer();
                    this.directionsRenderer.setMap(map);

                    const originInput = document.getElementById("origin-input");
                    const destinationInput = document.getElementById("destination-input");

                    const modeSelector = document.getElementById("mode-selector");
                    // Specify just the place data fields that you need.
                    const originAutocomplete = new google.maps.places.Autocomplete(
                        originInput,
                        { fields: ["place_id"] }
                    );
                    // Specify just the place data fields that you need.
                    const destinationAutocomplete = new google.maps.places.Autocomplete(
                        destinationInput,
                        { fields: ["place_id"] }
                    );

                    this.setupClickListener(
                        "changemode-driving",
                        google.maps.TravelMode.DRIVING
                    );
                    this.setupPlaceChangedListener(originAutocomplete, "ORIG");
                    this.setupPlaceChangedListener(destinationAutocomplete, "DEST");
                    // this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
                    // this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(
                    //     destinationInput
                    // );
                    // this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
                }
                // Sets a listener on a radio button to change the filter type on Places
                // Autocomplete.
                setupClickListener(id, mode) {
                    const radioButton = document.getElementById(id);

                    radioButton.addEventListener("click", () => {
                        this.travelMode = mode;
                        this.route();
                    });
                }
                setupPlaceChangedListener(autocomplete, mode) {
                    autocomplete.bindTo("bounds", this.map);
                    autocomplete.addListener("place_changed", () => {
                        const place = autocomplete.getPlace();

                        if (!place.place_id) {
                            window.alert("Please select an option from the dropdown list.");
                            return;
                        }

                        if (mode === "ORIG") {
                            this.originPlaceId = place.place_id;
                        } else {
                            this.destinationPlaceId = place.place_id;
                        }

                        this.route();

                        Livewire.emit('setGoogleMapPlaces', $("#origin-input").val(), $("#destination-input").val());
                    });
                }
                route() {
                    if (!this.originPlaceId || !this.destinationPlaceId) {
                        return;
                    }

                    const me = this;

                    this.directionsService.route(
                        {
                            origin: { placeId: this.originPlaceId },
                            destination: { placeId: this.destinationPlaceId },
                            travelMode: this.travelMode,
                        },
                        (response, status) => {
                            if (status === "OK") {
                                me.directionsRenderer.setDirections(response);
                                Livewire.emit('successGoogleMap');
                            } else {
                                window.alert("Directions request failed due to " + status);
                            }
                        }
                    );
                }
            }

            window.initMap = initMap;
</script>

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXl5k0hdaecdpWF7AcfhkXv4TN6MvQn6g&callback=initMap&libraries=places&v=weekly"
    defer></script>

<script>
    window.addEventListener('google-map-updated', event => {
            $("#set-distance").val(event.detail.distance);
            $("#set-duration").val(event.detail.duration);
        })
</script>
@endpush
