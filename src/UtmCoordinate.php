<?php


namespace sodecl\Coordinates;


class UtmCoordinate
{
    public $x;
    public $y;


    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;

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
