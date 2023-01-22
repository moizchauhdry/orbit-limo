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
            <div class="chbs-summary-field-value">{{$extra_time}} Hours</div>
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
        @if ($current_step == 3)
        <div class="chbs-summary-field">
            <div class="chbs-summary-field-name">Vehicle</div>
            <div class="chbs-summary-field-value">{{getVehicleName($vehicle_id)}}</div>
        </div>
        @endif
    </div>
    <div class="chbs-summary-price-element">
        @include('livewire.frontend.bookings.summary-price-element')
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
