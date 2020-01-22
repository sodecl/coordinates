<?php /** @noinspection PhpParamsInspection */


use sodecl\Coordinates\LatLngCoordinate;
use sodecl\Coordinates\UtmCoordinate;

class LatLngCoordinateTest extends \PHPUnit\Framework\TestCase
{

    public function testCoordinateIsInversed()
    {
        $lat = -38.7290686;
        $long = -72.672761;

        $latlng = new LatLngCoordinate($lat, $long);

        $this->assertInstanceOf(UtmCoordinate::class, $latlng->toUtm());

        $inversed = $latlng->toUtm()->toLatLng(18, false);

        $this->assertEquals($inversed->latitude, $lat);
        $this->assertEquals($inversed->longitude, $long);
    }
}
