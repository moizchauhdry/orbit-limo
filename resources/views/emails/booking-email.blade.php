@extends('layouts.email')

@section('content')

<div style="text-align:left;padding:35px">
    <p>Dear <b>{{ $booking->first_name }} {{ $booking->last_name }}</b>,</p>
    <p>Your booking has been submitted.</p>
    <p><b>Pick-up Date/Time:</b> {{getDateByFormat($booking->pickup_date)}}
        ({{getTimeByFormat($booking->pickup_time)}})</p>
    <p><b>Pick-up Location:</b> {{$booking->pickup_location}}</p>
    <p><b>Drop-off Location:</b> {{$booking->drop_location}}</p>
    <p><b>Things to keep in mind:</b></p>
    <p>
    <ul>
        <li>IF YOUR PICKUP LOCATION IS AN AIRPORT, THE DRIVER WILL WAIT <b>1 HOUR AND 15
                MINUTES AFTER YOUR FLIGHT HAS LANDED</b> AFTER
            WHICH <b>WAITING CHARGES WILL APPLY.</b></li>
        <li>IF YOUR PICKUP LOCATION IS NOT AN AIRPORT (i.e. house, apartment buildings)
            THE DRIVER WILL WAIT 15 MINUTES AT THE
            LOCATION AFTER WHICH <b>WAITING CHARGES WILL APPLY.</b></li>
        <li>ABSOLUTELY NO EATING OR DRINKING ALLOWED IN THE VEHICLES.</li>
        <li><b>NO ALCOHOL WHATSOEVER.</b></li>
        <li>IF YOU WISH TO TIP YOU CAN PAY CASH DIRECTLY TO THE DRIVER OR CONTACT
            <a href="info@orbitlimo.ca">info@orbitlimo.ca</a> WITH YOUR DRIVERS NAME.
        </li>
        <li>IF YOU WISH TO CANCEL, YOU CAN DO SO <b>1 HOUR BEFORE YOUR PICKUP TIME.</b>
            AFTER
            THAT <b>YOU WILL NOT BE ELIGIBLE</b> FOR A REFUND
            OF ANY KIND.</li>
    </ul>
    </p>

    <br>

    <p>
        Thank you for using our services. <br>
        Best Regards, <br>
        Orbit Limo
    </p>
</div>

@endsection