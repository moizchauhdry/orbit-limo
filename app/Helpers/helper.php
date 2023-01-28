<?php

use App\Models\Vehicle;
use Carbon\Carbon;

if (!function_exists('clean_string')) {
    function clean_string($string)
    {
        $result = str_replace(array('\'', '"', ',', ';', '<', '>', '!', '-'), ' ', $string);
        return $result;
    }
}


if (!function_exists('getVehicle')) {
    function getVehicle($id)
    {
        $name = Vehicle::find($id)->name ?? '';
        $image = Vehicle::find($id)->image ?? '';

        return [
            'name' => $name,
            'image' => $image,
        ];
    }
}


if (!function_exists('calculateVehicleAmount')) {
    function calculateVehicleAmount($id, $service_type, $distance, $duration_in_hours)
    {
        $vehicle = Vehicle::find($id);


        if ($service_type == 1) {
            $distance_in_km = distanceInKm($distance);

            if ($distance_in_km <= $vehicle->ptp_min_distance) {
                $result = $vehicle->ptp_min_amount;
            } else {
                $result = (($distance_in_km - $vehicle->ptp_min_distance) * $vehicle->ptp_adt_amount_per_km) + $vehicle->ptp_min_amount;
            }
        } else {
            if ($duration_in_hours <= $vehicle->hrly_min_hour) {
                $result = $vehicle->hrly_min_amount;
            } else {
                $result = (($duration_in_hours - $vehicle->hrly_min_hour) * $vehicle->hrly_adt_amount_per_hour) + $vehicle->hrly_min_amount;
            }
        }

        return number_format((float)$result, 2, '.', '');
    }
}

if (!function_exists('distanceInKm')) {
    function distanceInKm($distance)
    {
        $distance_in_km = 0;
        if (isset($distance) && !empty($distance)) {
            $distance = explode(" ", $distance);
            $distance_in_km = $distance[0] * 1.60934;
        }

        return number_format((float)$distance_in_km, 2, '.', '');
    }
}


if (!function_exists('getDateByFormat')) {
    function getDateByFormat($date)
    {
        $format_date = null;
        if (isset($date)) {
            $format_date = Carbon::parse($date)->format('d F, Y');
        }
        return $format_date;
    }
}

if (!function_exists('getTimeByFormat')) {
    function getTimeByFormat($time)
    {
        $format_time = null;
        if (isset($time)) {
            $format_time = Carbon::parse($time)->format('h:i A');
        }
        return $format_time;
    }
}
