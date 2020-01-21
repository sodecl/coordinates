<?php


namespace sodecl\Coordinates;


class Transform
{

    public static function utmToLatLng($x, $y, $zone, $aboveEquator)
    {
        if (!is_numeric($x) or !is_numeric($y) or !is_numeric($zone)) {
            return json_encode(array('success' => false, 'msg' => "Wrong input parameters"));
        }
        $southhemi = false;
        if ($aboveEquator != true) {
            $southhemi = true;
        }
        $latlon = UTMXYToLatLon($x, $y, $zone, $southhemi);
        return json_decode(json_encode(array('success' => true, 'attr' => array('lat' => radian2degree($latlon[0]), 'lon' => radian2degree($latlon[1])))));
    }

    public static function latLangToUtm($lat, $lon)
    {
        if (!is_numeric($lon)) {
            return json_encode(array('success' => false, 'msg' => "Wrong longitude value"));
        }
        if ($lon < -180.0 or $lon >= 180.0) {
            return json_encode(array('success' => false, 'msg' => "The longitude is out of range"));
        }
        if (!is_numeric($lat)) {
            return json_encode(array('success' => false, 'msg' => "Wrong latitude value"));
        }
        if ($lat < -90.0 or $lat > 90.0) {
            return json_encode(array('success' => false, 'msg' => "The longitude is out of range"));
        }
        $zone = floor(($lon + 180.0) / 6) + 1;
        //compute values
        $result = LatLonToUTMXY(degree2radian($lat), degree2radian($lon), $zone);
        $aboveEquator = false;
        if ($lat > 0) {
            $aboveEquator = true;
        }
        return json_decode(json_encode(array('success' => true, 'attr' => array('x' => $result[0], 'y' => $result[1], 'zone' => $zone, 'aboveEquator' => $aboveEquator))));
    }
}



