<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }


    public function booking()
    {
        return view('frontend.booking');
    }

    public function storeBooking(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'pickup_date' => ['required'],
            'pickup_time' => ['required'],
            'pickup_location' => ['required'],
            'drop_location' => [Rule::requiredIf($request->booking_type == 'distance')],
            'booking_type' => ['required', 'in:distance,hourly'],
            'duration_in_hours' =>  [Rule::requiredIf($request->booking_type == 'hourly')],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        session()->put('pickup_date', $request->input('pickup_date'));
        session()->put('pickup_time', $request->input('pickup_time'));
        session()->put('pickup_location', $request->input('pickup_location'));
        session()->put('drop_location', $request->input('drop_location'));
        // session()->put('total_distance', $request->input('total_distance'));
        // session()->put('total_time', $request->input('total_time'));
        session()->put('booking_type', $request->input('booking_type'));
        session()->put('duration_in_hours', $request->input('duration_in_hours'));

        return response()->json(['success' => 'success']);
    }
}
