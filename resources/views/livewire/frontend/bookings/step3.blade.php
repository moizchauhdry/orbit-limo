@if ($current_step == 3)
<div class="chbs-main-content-step-3" style="display: block; transform: none;">
    <div class="row" style="transform: none;">
        <div class="col-md-3" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
            <div class="theiaStickySidebar"
                style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
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
                        <div class="chbs-summary-field-value">New York, NY, USA</div>
                    </div>
                    <div class="chbs-summary-field">
                        <div class="chbs-summary-field-name">Drop off location</div>
                        <div class="chbs-summary-field-value">New York, NY, USA</div>
                    </div>
                    <div class="chbs-summary-field">
                        <div class="chbs-summary-field-name">Pickup date, time</div>
                        <div class="chbs-summary-field-value">27-01-2023, 7:00</div>
                    </div>
                    <div class="chbs-summary-field">
                        <div class="chbs-summary-field-name">Extra time</div>
                        <div class="chbs-summary-field-value">1 hours</div>
                    </div>
                    <div class="chbs-summary-field">
                        <div class="chbs-layout-50x50 chbs-clear-fix">
                            <div class="chbs-layout-column-left">
                                <div class="chbs-summary-field-name">Total distance</div>
                                <div class="chbs-summary-field-value">0 km</div>
                            </div>
                            <div class="chbs-layout-column-right">
                                <div class="chbs-summary-field-name">Total time</div>
                                <div class="chbs-summary-field-value">1 h 0 m</div>
                            </div>
                        </div>
                    </div>
                    <div class="chbs-summary-field">
                        <div class="chbs-summary-field-name">Vehicle</div>
                        <div class="chbs-summary-field-value">Ford Tourneo</div>
                    </div>
                </div>
                <div class="chbs-summary-price-element">
                    <div class="chbs-summary-price-element-time-extra">
                        <span>Extra time</span>
                        <span>$62.00</span>
                    </div>
                    <div class="chbs-summary-price-element-total">
                        <span>Total</span>
                        <span>$62.00</span>
                    </div>
                    <div class="chbs-summary-price-element-pay">
                        <span>To pay <span>(30% deposit)</span></span>
                        <span>$18.60</span>
                    </div>
                </div>
                <div class="resize-sensor"
                    style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
                    <div class="resize-sensor-expand"
                        style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                        <div
                            style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 285px; height: 967px;">
                        </div>
                    </div>
                    <div class="resize-sensor-shrink"
                        style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                        <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%">
                        </div>
                    </div>
                </div>
            </div>
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
                                <input type="text" name="chbs_client_contact_detail_first_name" value="">
                            </div>
                            <div class="chbs-form-field chbs-form-field-width-50">
                                <label>Last name *</label>
                                <input type="text" name="chbs_client_contact_detail_last_name" value="">
                            </div>
                        </div>
                        <div class="chbs-clear-fix">
                            <div class="chbs-form-field chbs-form-field-width-50">
                                <label>E-mail address *</label>
                                <input type="text" name="chbs_client_contact_detail_email_address" value="">
                            </div>
                            <div class="chbs-form-field chbs-form-field-width-50">
                                <label>Phone number</label>
                                <div class="iti iti--allow-dropdown iti--separate-dial-code">
                                    <div class="iti__flag-container">
                                        <div class="iti__selected-flag" role="combobox" aria-owns="country-listbox"
                                            tabindex="0" title="Pakistan (‫پاکستان‬‎): +92">
                                            <div class="iti__flag iti__pk"></div>
                                            <div class="iti__selected-dial-code">+92</div>
                                            <div class="iti__arrow"></div>
                                        </div>
                                    </div>
                                    <input type="text" name="chbs_client_contact_detail_phone_number_placeholder"
                                        value="" autocomplete="off" style="padding-left: 72px;"
                                        placeholder="301 2345678" data-intl-tel-input-id="0">
                                </div>
                                <input type="hidden" name="chbs_client_contact_detail_phone_number" value="">
                            </div>
                        </div>
                        <div class="chbs-clear-fix">
                            <div class="chbs-form-field">
                                <label>Comments</label>
                                <textarea name="chbs_comment"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chbs-payment-form">
                <h4 class="chbs-payment-header">
                    Choose payment method
                </h4>
                <ul class="chbs-payment chbs-list-reset">
                    <li>
                        <a href="#" data-payment-id="1" class="chbs-payment-type-1">
                            <span class="chbs-meta-icon-wallet"></span>
                            <span class="chbs-payment-name">Cash</span>
                            <span class="chbs-meta-icon-tick"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-payment-id="2" class="chbs-payment-type-2">
                            <span class="chbs-meta-icon-tick"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-payment-id="3" class="chbs-payment-type-3">
                            <span class="chbs-meta-icon-tick"></span>
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
        Choose a Vehicle </button>
    <button wire:click="submitStep3" type="button" class="chbs-button chbs-button-style-1 chbs-button-step-next">
        Booking Summary <span class="chbs-meta-icon-arrow-horizontal-large"></span>
    </button>
</div>
@endif
