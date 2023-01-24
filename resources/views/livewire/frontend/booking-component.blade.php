<div>
    <div class="container">
        <div class="mt-4 mb-4">
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

    @include('livewire.loader')
</div>
