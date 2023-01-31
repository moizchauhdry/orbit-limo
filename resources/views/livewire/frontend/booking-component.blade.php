<div>
    <div class="container">
        <div class="mt-4 mb-4">
            <div class="text-center mb-4">
                <img src="https://orbitlimo.ca/wp-content/uploads/2023/01/orbit-logo--189x84.png" alt="">
            </div>
            <div class="chbs-main chbs-booking-form-id-10007 chbs-clear-fix chbs-hidden" id="">
                @include('livewire.frontend.bookings.step-bar')
                <div class="chbs-main-content chbs-clear-fix">
                    @include('livewire.frontend.bookings.step1')
                    @include('livewire.frontend.bookings.step2')
                    @include('livewire.frontend.bookings.step3')
                    @include('livewire.frontend.bookings.step4')
                    @include('livewire.frontend.bookings.step5')
                </div>
            </div>
        </div>
    </div>

    <div wire:loading
        wire:target="submitStep1,submitStep2,submitStep3,submitStep4,back,selectVehicle,cartIncrement,cartDecrement,serviceType">
        <div class="lds-roller">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="modal-backdrop show backStyle"></div>
    </div>
</div>
