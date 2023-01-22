<?php

use App\Models\Vehicle;

if (!function_exists('clean_string')) {
    function clean_string($string)
    {
        $result = str_replace(array('\'', '"', ',', ';', '<', '>', '!', '-'), ' ', $string);
        return $result;
    }
}


if (!function_exists('getVehicleName')) {
    function getVehicleName($id)
    {
        return Vehicle::find($id)->name ?? '';
    }
}


if (!function_exists('calculateVehicleAmount')) {
    function calculateVehicleAmount($id, $distance)
    {
        $distance_in_km = distanceInKm($distance);

        $vehicle = Vehicle::find($id);

        if ($distance_in_km <= $vehicle->ptp_min_distance) {
            $result = $vehicle->ptp_min_amount;
        } else {
            $result = (($distance_in_km - $vehicle->ptp_min_distance) * $vehicle->ptp_adt_amount_per_km) + $vehicle->ptp_min_amount;
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
