<div class="chbs-summary-field">
    <div class="chbs-summary-field-name">Service type</div>
    <div class="chbs-summary-field-value">{{$service_type == 1 ? 'Distance' : 'Hourly'}}</div>
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
@if ($service_type == 2)
<div class="chbs-summary-field">
    <div class="chbs-summary-field-name">Duration (In Hours)</div>
    <div class="chbs-summary-field-value">{{$duration_in_hours}} Hours</div>
</div>
@endif
<div class="chbs-summary-field">
    <div class="chbs-layout-50x50 chbs-clear-fix">
        <div class="chbs-layout-column-left">
            <div class="chbs-summary-field-name">Total distance</div>
            <div class="chbs-summary-field-value">{{distanceInKm($total_distance)}} Km</div>
        </div>
        <div class="chbs-layout-column-right">
            <div class="chbs-summary-field-name">Total time</div>
            <div class="chbs-summary-field-value">{{$total_time}}</div>
        </div>
    </div>
</div>
@if ($current_step == 3)
<div class="chbs-summary-field">
    <div class="chbs-summary-field-name">Vehicle</div>
    <div class="chbs-summary-field-value">{{getVehicle($vehicle_id)['name']}}</div>
</div>
@endif
