@if ($current_step == 1)
<div class="chbs-main-content-step-1">
    <div class="row">
        <div class="col-md-6">
            <div class="chbs-tab chbs-box-shadow">

                <div class="btn-group p-2 float-end" role="group" aria-label="Basic radio toggle button group">
                    <input wire:click="serviceType(1)" type="radio" class="btn-check" name="service_type" id="distance"
                        autocomplete="off" {{$service_type==1 ? 'checked' : '' }}>
                    <label class="btn btn-outline-primary" for="distance">Distance</label>

                    <input wire:click="serviceType(2)" type="radio" class="btn-check" name="service_type" id="hourly"
                        autocomplete="off" {{$service_type==2 ? 'checked' : '' }}>
                    <label class="btn btn-outline-primary" for="hourly">Hourly</label>
                </div>

                <div id="panel-1">
                    <label class="chbs-form-label-group">Ride details</label>
                    <div class="chbs-clear-fix chbs-form-field-pickup-date-time">
                        <div class="chbs-form-field chbs-form-field-width-50">
                            <label class="chbs-form-field-label">
                                Pickup date <span class="text-danger">*</span> <span
                                    class="chbs-tooltip chbs-meta-icon-question"
                                    title="The date when your journey will start."></span>
                                @error('pickup_date') <span
                                    class="text-danger ml-4 fw-bold">{{ $message }}</span>@enderror
                            </label>
                            <input wire:model.defer="pickup_date" type="date" class="chbs-datepicker">
                        </div>
                        <div class="chbs-form-field chbs-form-field-width-50">
                            <label>
                                Pickup time <span class="text-danger">*</span> <span
                                    class="chbs-tooltip chbs-meta-icon-question"
                                    title="The time when your journey will start."></span>
                                @error('pickup_time') <span
                                    class="text-danger ml-4 fw-bold">{{ $message }}</span>@enderror
                            </label>
                            <input wire:model.defer="pickup_time" type="time" class="chbs-timepicker">
                        </div>
                    </div>

                    <div class="chbs-form-field chbs-form-field-location-autocomplete chbs-form-field-location-switch"
                        data-label-waypoint="Waypoint">
                        <label>
                            Pickup location <span class="text-danger">*</span> <span
                                class="chbs-my-location-link">&nbsp;&nbsp;-&nbsp;&nbsp;<a href="#">Use
                                    my location</a></span>
                            <span class="chbs-tooltip chbs-meta-icon-question"
                                title="The address where your journey will start."></span>
                            @error('pickup_location') <span
                                class="text-danger ml-4 fw-bold">{{ $message }}</span>@enderror
                        </label>
                        <input type="text" wire:model.defer="pickup_location" wire:keyup="changeOrigin"
                            id="origin-input" @if ($disabled) disabled @endif>
                    </div>
                    <div class="chbs-form-field chbs-form-field-location-autocomplete">
                        <label>
                            Drop-off location @if ($service_type == 1)
                            <span class="text-danger">*</span>
                            @endif <span class="chbs-tooltip chbs-meta-icon-question"
                                title="The address where your journey will end."></span>
                            @error('drop_location') <span
                                class="text-danger ml-4 fw-bold">{{ $message }}</span>@enderror
                        </label>
                        <input type="text" wire:model.defer="drop_location" wire:keyup="changeDestination"
                            id="destination-input" @if ($disabled) disabled @endif>
                    </div>

                    @if ($service_type == 2)
                    <label class="chbs-form-label-group">Hourly options</label>
                    <div class="chbs-form-field chbs-form-field-extra-time">
                        <label>
                            Duration (In Hours) <span class="chbs-tooltip chbs-meta-icon-question"
                                title="Extra time included to the journey."></span>
                            @error('duration_in_hours') <span
                                class="text-danger ml-4 fw-bold">{{ $message }}</span>@enderror
                        </label>
                        <select wire:model.defer="duration_in_hours">
                            <option selected value="">-Select Hour-</option>
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
                    @endif
                </div>


                @if ($disabled)
                <button wire:click="changeLocation" class="btn btn-sm btn-warning m-2 float-end text-white"><i
                        class="bi bi-geo-fill me-1"></i>Change Location</button>
                @endif

            </div>

            @if ($service_type == 2)
            <span class="fw-bold mt-2">Note: 30kms allowed per hour.</span>
            @endif
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
                    <span>Distance</span>
                    <span style="font-size: 18px">{{distanceInKm($total_distance)}} km</span>
                </div>
                <div>
                    <span class="chbs-meta-icon-clock"></span>
                    <span>Total time</span>
                    <span style="font-size: 18px">{{$total_time}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="chbs-clear-fix chbs-main-content-navigation-button">
        <button wire:click="submitStep1" type="button" class="chbs-button chbs-button-style-1 chbs-button-step-next">
            Next <span class="chbs-meta-icon-arrow-horizontal-large"></span>
        </button>
    </div>
</div>
@endif

@push('js')
<style>
    #map {
        height: 375px;
        width: 100%
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', async function () {
        window.livewire.on('init-map', () => {
            initMap();
        });
    });

    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            mapTypeControl: false,
            center: { lat: 43.676454330627266, lng: -79.62731891227067 },
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
                console.log(place);

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

    // window.initMap = initMap;
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
