<?php
/**
 * Created by PhpStorm.
 * User: mohsinsaeed
 * Date: 24/05/2018
 * Time: 11:25 PM
 */

require_once 'City.php';
use tsp\City;
use tsp\GA;
use tsp\Population;
use tsp\TourManager;



//define("DATA_PATH", "data".DIRECTORY_SEPARATOR."GEOM");
define("DATA_PATH", "data");






function initialize(){

    //$fileData = file(DATA_PATH.DIRECTORY_SEPARATOR."GEOM".DIRECTORY_SEPARATOR."france.tsp");
    $fileData = file(DATA_PATH.DIRECTORY_SEPARATOR."EUC_2D".DIRECTORY_SEPARATOR."djibouti.tsp");



    //echo "<pre>";
// print_r($fileData);

    foreach($fileData as $line){
        if (strpos($line, 'EDGE_WEIGHT_TYPE') !== false){
            //echo "<->".$line;
            $tokens = explode(":", $line);
            TourManager::setEdgeWeightType(trim($tokens[1]));
            break;
        }
    }


    foreach($fileData as $line){
        if (strpos($line, ':') !== false || strpos($line, 'NODE_COORD_SECTION') !== false || strpos($line, 'EOF') !== false ) {
            continue;
        }
        //echo $line."<br/>";

        $linePieces = explode(" ", $line);

        //print_r($linePieces);
        TourManager::addCity(new City($linePieces[1], $linePieces[2]));
    }
}

function initialize1()
{


//Create and add our cities
    $city1 = new City(60, 200);
    TourManager::addCity($city1);
    $city2 = new City(180, 200);
    TourManager::addCity($city2);
    $city3 = new City(80, 180);
    TourManager::addCity($city3);
    $city4 = new City(140, 180);
    TourManager::addCity($city4);
    $city5 = new City(20, 160);
    TourManager::addCity($city5);
    $city6 = new City(100, 160);
    TourManager::addCity($city6);
    $city7 = new City(200, 160);
    TourManager::addCity($city7);
    $city8 = new City(140, 140);
    TourManager::addCity($city8);
    $city9 = new City(40, 120);
    TourManager::addCity($city9);
    $city10 = new City(100, 120);
    TourManager::addCity($city10);
    $city11 = new City(180, 100);
    TourManager::addCity($city11);
    $city12 = new City(60, 80);
    TourManager::addCity($city12);
    $city13 = new City(120, 80);
    TourManager::addCity($city13);
    $city14 = new City(180, 60);
    TourManager::addCity($city14);
    $city15 = new City(20, 40);
    TourManager::addCity($city15);
    $city16 = new City(100, 40);
    TourManager::addCity($city16);
    $city17 = new City(200, 40);
    TourManager::addCity($city17);
    $city18 = new City(20, 20);
    TourManager::addCity($city18);
    $city19 = new City(60, 20);
    TourManager::addCity($city19);
    $city20 = new City(160, 20);
    TourManager::addCity($city20);


}

initialize();
