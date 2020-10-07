<?php


namespace sodecl\Coordinates;


class UtmCoordinate
{
    public $x;
    public $y;
    public $zone;
    public $aboveEquator;


    public function __construct($x, $y, $zone=18, $aboveEquator=false)
    {
        $this->x = $x;
        $this->y = $y;
        $this->zone = $zone;
        $this->aboveEquator = $aboveEquator;
    }

    public function toLatLng($zone=18,$aboveEquator=false){
        $transformed = Transform::utmToLatLng($this->x,$this->y,$zone,$aboveEquator);

        return new LatLngCoordinate($transformed->attr->lat,$transformed->attr->lon);
    }
    public function __toString()
    {

        return "X: " . $this->x . ", Y:" . $this->y;
    }

}
