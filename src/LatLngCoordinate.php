<?php


namespace sodecl\Coordinates;


class LatLngCoordinate
{
    public $latitude;
    public $longitude;


    public function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;

    }

    public function toUtm()
    {
        $transformed = Transform::latLangToUtm($this->latitude, $this->longitude);

        return new UtmCoordinate($transformed->attr->x, $transformed->attr->x);
    }

    public function __toString()
    {

        return "Lat: " . $this->latitude . ", Lng:" . $this->longitude;
    }


}
