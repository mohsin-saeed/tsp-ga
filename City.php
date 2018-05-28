<?php
namespace tsp;

class City {

//    public $x;
//    public $y;
    public $distanceUnit;
    public $lat;
    public $long;


    public function __construct($lat, $long, $unit = 'M')
    {
        $this->lat = $lat;
        $this->long = $long;
        $this->distanceUnit = $unit;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function getLong()
    {
        return $this->long;
    }

    public function distanceTo(City $city) {


        // http://www.math.uwaterloo.ca/tsp/data/index.html
        // https://www.researchgate.net/publication/284512855_Spain_TSP_instance
        // https://github.com/mortada/notebooks/blob/master/blog/TSP/tesla196.tsp


        // // //
        if(TourManager::$edge_weight_type == 'GEOM'){
            $distance = $this->getGeoDistance($this->getLat(),$this->getLong(), $city->getLat(), $city->getLong(), $this->distanceUnit);
        }else if(TourManager::$edge_weight_type == 'EUC_2D'){
            $distance = $this->getECU2DDistance($this->getLat(),$this->getLong(), $city->getLat(), $city->getLong());
        }else{
            die("Non Supported Edge type found in tsplib input file");
        }

        return $distance;
    }


    public function getGeoDistance($lat1, $lon1, $lat2, $lon2, $unit) {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }


    public function getECU2DDistance($lat1, $lon1, $lat2, $lon2) {

       // echo "| >".$lat1."-".$lon1."-".$lat2."-".$lon2." <|";

        $xDistance = abs($lat1 - $lat2);
        $yDistance = abs($lon1 - $lon2);

        $distance = sqrt( ($xDistance*$xDistance) + ($yDistance*$yDistance) );

        return $distance;
    }

    public function __toString()
    {
        return $this->getLat() . ', '  . $this->getLong();
    }
}