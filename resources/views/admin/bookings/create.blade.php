@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-7">
            <form method="post" action="{{route('bookings.store')}}"> @csrf
                <input type="hidden" name="user_id">

                <h5 class="text-center"><u>Ride Information</u></h5>

                <div class="row">
                    <div class="col-md-6 form-group mb-2">
                        <label for="pickup_date"><strong>Pickup Date</strong></label>
                        <input type="date" class="form-control" name="pickup_date" id="pickup_date">
                        @error('pickup_date') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-md-6 form-group mb-2">
                        <label for="pickup_time"><strong>Pickup Time</strong></label>
                        <input type="time" class="form-control" name="pickup_time" id="pickup_time">
                        @error('pickup_time') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6 form-group mb-2">
                        <label for="pickup_location"><strong>Pickup Location</strong></label>
                        <input type="text" class="form-control" name="pickup_location" id="origin-input">
                        @error('pickup_location') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6 form-group mb-2">
                        <label for="drop_location"><strong>Drop-off Location</strong></label>
                        <input type="text" class="form-control" name="drop_location" id="destination-input">
                        @error('drop_location') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6 form-group mb-2">
                        <label for="total_distance"><strong>Total Distance</strong></label>
                        <input type="number" class="form-control" name="total_distance" id="total_distance">
                        @error('total_distance') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-6 form-group mb-2">
                        <label for="total_time"><strong>Total Time</strong></label>
                        <input type="time" class="form-control" name="total_time" id="total_time">
                        @error('total_time') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <h5 class="text-center"><u>Vehicle Information</u></h5>
                <div class="row">
                    <div class="form-group col-md-6 mb-2">
                        <label for="vehicle_id"><strong>Vehicle</strong></label>
                        <select name="vehicle_id" class="form-select" id="vehicle_id"
                            aria-label="Floating label select example">
                            <option value="" selected>--Select Vehicle--</option>
                            @foreach ($vehicles as $vehicle)
                            <option value="{{$vehicle->id}}">{{$vehicle->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 form-group mb-2">
                        <label for="passenger"><strong>Passenger</strong></label>
                        <input type="number" class="form-control" name="passenger" id="passenger">
                        @error('passenger') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-md-3 form-group mb-2">
                        <label for="suitcase"><strong>Suitcase</strong></label>
                        <input type="number" class="form-control" name="suitcase" id="suitcase">
                        @error('suitcase') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>

                <h5 class="text-center"><u>Contact Information</u></h5>
                <div class="row">
                    <div class="col-md-6 form-group mb-2">
                        <label for="first_name"><strong>First Name</strong></label>
                        <input type="text" class="form-control" name="first_name" id="first_name">
                        @error('first_name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="col-md-6 form-group mb-2">
                        <label for="last_name"><strong>Last Name</strong></label>
                        <input type="text" class="form-control" name="last_name" id="last_name">
                        @error('last_name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <label for="email"><strong>Email</strong></label>
                        <input type="email" class="form-control" name="email" id="email">
                        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <label for="phone"><strong>Phone</strong></label>
                        <input type="phone" class="form-control" name="phone" id="phone">
                        @error('phone') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="name"><strong>Comments</strong></label>
                        <textarea name="comments" class="form-control" name="comments" id="comments" cols="30"
                            rows="5"></textarea>
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <button type="submit" wire:click.prevent="store()" class="btn btn-primary">Save & Submit</button>
            </form>
        </div>
        <div class="col-md-5">
            <div style="display: none">
                <div id="mode-selector" class="controls">
                    <input type="radio" name="type" id="changemode-driving" checked="checked" />
                    <label for="changemode-driving">Driving</label>
                </div>
            </div>
            <div id="map"></div>
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
                console.log(originInput);

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
