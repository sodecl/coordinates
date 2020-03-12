<?php /** @noinspection PhpParamsInspection */


use sodecl\Coordinates\LatLngCoordinate;
use sodecl\Coordinates\UtmCoordinate;
use sodecl\Coordinates\Validator;

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

    public function testValidator(){
        $lat = -38.7290686;
        $long = -72.672761;
        $latlng = new LatLngCoordinate($lat, $long);
        $inversed = $latlng->toUtm();


        $this->assertTrue(Validator::isLatLng($lat,$long));
        $this->assertFalse(Validator::isLatLng($inversed->x,$inversed->y));
    }
}
