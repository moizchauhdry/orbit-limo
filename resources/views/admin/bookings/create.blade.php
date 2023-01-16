@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-7">
            <livewire:bookings.create-booking />
        </div>
        <div class="col-md-5">
            <div style="display: none">
                <div id="mode-selector" class="controls">
                    <input type="radio" name="type" id="changemode-driving" checked="checked" />
                    <label for="changemode-driving">Driving</label>
                </div>
            </div>
            <div id="map"></div>
            <div class="row p-4">
                <div class="form-group col-md-6">
                    <input type="text" name="set-distance" id="set-distance" class="form-control"
                        placeholder="TOTAL DISTANCE" readonly>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="set-duration" id="set-duration" class="form-control"
                        placeholder="TOTAL TIME" readonly>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

<style>
    #map {
        height: 500px;
        width: 100%
    }
</style>

<script>
    // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script
        // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
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
