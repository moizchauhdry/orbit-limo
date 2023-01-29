@if ($current_step == 3)
<div class="chbs-main-content-step-3" style="display: block; transform: none;">
    <div class="row" style="transform: none;">
        <div class="col-md-3" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
            @include('livewire.frontend.bookings.summary-bar')
        </div>
        <div class="col-md-9">
            <div></div>
            <div class="chbs-client-form">
                <div class="chbs-client-form-sign-up">
                    <div class="chbs-box-shadow">
                        <div class="chbs-clear-fix">
                            <label class="chbs-form-label-group">Contact details</label>
                            <div class="chbs-form-field chbs-form-field-width-50">
                                <label>First name *</label>
                                <input type="text" wire:model.defer="first_name">
                            </div>
                            <div class="chbs-form-field chbs-form-field-width-50">
                                <label>Last name *</label>
                                <input type="text" wire:model.defer="last_name">
                            </div>
                        </div>
                        <div class="chbs-clear-fix">
                            <div class="chbs-form-field chbs-form-field-width-50">
                                <label>E-mail address *</label>
                                <input type="email" wire:model.defer="email">
                            </div>
                            <div class="chbs-form-field chbs-form-field-width-50">
                                <label>Phone number</label>
                                <div class="iti iti--allow-dropdown iti--separate-dial-code">
                                    <div class="iti__flag-container">
                                        <div class="iti__selected-flag" role="combobox" aria-owns="country-listbox"
                                            tabindex="0" title="Pakistan (‫پاکستان‬‎): +1">
                                            {{-- <div class="iti__flag iti__pk"></div> --}}
                                            <div class="iti__selected-dial-code">+1</div>
                                            {{-- <div class="iti__arrow"></div> --}}
                                        </div>
                                    </div>
                                    <input type="number" wire:model.defer="phone" autocomplete="off"
                                        style="padding-left: 72px;" placeholder="301 2345678"
                                        data-intl-tel-input-id="0">
                                </div>
                                <input type="hidden" name="chbs_client_contact_detail_phone_number" value="">
                            </div>
                        </div>
                        <div class="chbs-clear-fix">
                            <div class="chbs-form-field">
                                <label>Comments</label>
                                <textarea name="chbs_comment" wire:model.defer="comments"
                                    placeholder="e.g Flight No, Service Name"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chbs-payment-form">
                <h4 class="chbs-payment-header">
                    Payment method
                </h4>
                <ul class="chbs-payment chbs-list-reset">
                    <li>
                        <a href="#" class="chbs-payment-type-3">
                            <i class="bi bi-check-circle mb-4 text-success fs-2"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="chbs-clear-fix chbs-main-content-navigation-button" style="margin-top: 20px;">
    <button wire:click="back(2)" type="button" class="chbs-button chbs-button-style-2 chbs-button-step-prev">
        <span class="chbs-meta-icon-arrow-horizontal-large"></span>
        Back </button>
    <button wire:click="submitStep3" type="button" class="chbs-button chbs-button-style-1 chbs-button-step-next">
        Next <span class="chbs-meta-icon-arrow-horizontal-large"></span>
    </button>
</div>
@endif
