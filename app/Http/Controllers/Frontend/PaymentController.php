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

        $url = 'https://connect.squareupsandbox.com/v2/payments';
        $body = [
            'amount_money' => [
                'amount' => $booking->grand_total,
                'currency' => 'CAD',
            ],
            'idempotency_key' => (string) Str::uuid(),
            'source_id' => $request->payment_token,
        ];

        $headers = [
            'Authorization' => 'Bearer EAAAEFPXBi9lWx8ObCdZBQh2Ve2exWLT-6R3AoYNTjdjtttvK9I0VRLMCWX8Pgkm'
        ];

        $response = Http::withHeaders($headers)->post($url, $body);

        $status_code = $response->status();
        $response_body = json_decode($response->getBody(), true);

        dd($response_body);

        return response()->json([
            'status' => true,
            'code' => $status_code,
            'message' => 'success',
        ]);
    }
}
