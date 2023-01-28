<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function squarePayment($booking_id)
    {
        $booking = Booking::find($booking_id);
        return view('frontend.square-payment', compact('booking'));
    }

    public function squarePaymentSuccess(Request $request)
    {
        $booking = Booking::find($request->booking_id);

        $url = 'https://connect.squareup.com/v2/payments';
        $body = [
            'amount_money' => [
                'amount' => (int) $booking->grand_total,
                'currency' => 'CAD',
            ],
            'idempotency_key' => (string) Str::uuid(),
            'source_id' => $request->payment_token,
        ];

        $headers = [
            'Authorization' => 'Bearer EAAAFPJlZxg1dvr39acAuQChqKzYuukzpo67UggwU3mfwMfX3LsG0BT6q5_YGFkf'
        ];

        $response = Http::withHeaders($headers)->post($url, $body);

        $status_code = $response->status();
        $response_body = json_decode($response->getBody(), true);

        return response()->json([
            'status' => true,
            'code' => $status_code,
            'message' => 'success',
        ]);
    }

    public function success($id)
    {
        $booking = Booking::find($id);
        return view('frontend.success', compact('booking'));
    }
}
