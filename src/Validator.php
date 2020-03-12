<?php

namespace sodecl\Coordinates;

class Validator
{
    const RGX_LAT="/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/";
    const RGX_LNG="/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/";

    public static function isLatLng($latitude,$longitude){
        if(preg_match(self::RGX_LAT,$latitude) && preg_match(self::RGX_LNG,$longitude)){
            return true;
        }
        return false;
    }
}
