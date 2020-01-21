# coordinates
// Convert UTM to LatLong and vice versa.  

### Instalation

```
composer require sodecl/coordinates

```

###Usage: 

```php
<?php  
require_once 'vendor/autoload.php';
use sodecl\Coordinates\UtmCoordinate;
use sodecl\Coordinates\LatLngCoordinate;

$x = 723536.02;
$y = 5738948.51;

$utm = new UtmCoordinate($x,$y);

echo $utm->toLatLng(18,false).PHP_EOL;

$lat =-38.469999579845 ;
$long = -72.438489495502;

$latlng = new LatLngCoordinate($lat,$long);

echo $latlng->toUtm().PHP_EOL;
  
?>   
```
