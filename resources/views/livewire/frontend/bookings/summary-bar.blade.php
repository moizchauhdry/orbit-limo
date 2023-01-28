<div class="theiaStickySidebar">
    <div class="chbs-summary">
        <div class="chbs-summary-header">
            <h4>Summary</h4>
        </div>
        @include('livewire.frontend.bookings.summary-ride-element')
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
