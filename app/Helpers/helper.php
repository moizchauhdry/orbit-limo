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
