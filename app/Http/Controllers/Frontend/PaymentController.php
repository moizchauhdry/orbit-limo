<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function squarePayment($booking_id)
    {
        $booking = Booking::find($booking_id);
        return view('frontend.square-payment', compact('booking'));
    }
}
