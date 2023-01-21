@if (in_array($current_step, ['1','2','3','4']))
<div class="chbs-main-navigation-default chbs-clear-fix" data-step-count="4">
    <ul class="chbs-list-reset">
        <li data-step="1" class="{{$current_step == 1 ? 'chbs-state-selected': ''}}">
            <div></div>
            <a href="#">
                <span>
                    <span>1</span>
                    <span class="chbs-meta-icon-tick"></span>
                </span>
                <span>Enter Ride Details</span>
            </a>
        </li>
        <li data-step="2" class="{{$current_step == 2 ? 'chbs-state-selected': ''}}">
            <div></div>
            <a href="#">
                <span>
                    <span>2</span>
                    <span class="chbs-meta-icon-tick"></span>
                </span>
                <span>Choose a Vehicle</span>
            </a>
        </li>
        <li data-step="3" class="{{$current_step == 3 ? 'chbs-state-selected': ''}}">
            <div></div>
            <a href="#">
                <span>
                    <span>3</span>
                    <span class="chbs-meta-icon-tick"></span>
                </span>
                <span>Enter Contact Details</span>
            </a>
        </li>
        <li data-step="4" class="{{$current_step == 4 ? 'chbs-state-selected': ''}}">
            <div></div>
            <a href="#">
                <span>
                    <span>4</span>
                    <span class="chbs-meta-icon-tick"></span>
                </span>
                <span>Booking Summary</span>
            </a>
        </li>
    </ul>
</div>
@endif
<div class="chbs-main-navigation-responsive chbs-box-shadow chbs-clear-fix">
    <div class="chbs-form-field">
        <select name="chbs_navigation_responsive" data-value="1">
            <option value="1">
                1. Enter Ride Details
            </option>
            <option value="2">
                2. Choose a Vehicle
            </option>
            <option value="3">
                3. Enter Contact Details
            </option>
            <option value="4">
                4. Booking Summary
            </option>
        </select>
    </div>
</div>
