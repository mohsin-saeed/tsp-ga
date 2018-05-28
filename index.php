<?php
require_once 'City.php';
require_once 'GA.php';
require_once 'Tour.php';
require_once 'TourManager.php';
require_once 'Population.php';
require_once 'Initializer.php';

use tsp\City;
use tsp\GA;
use tsp\Population;
use tsp\TourManager;

error_reporting(E_ERROR | E_WARNING | E_PARSE);


//define("DATA_PATH", "data".DIRECTORY_SEPARATOR."geom");
$to_time = strtotime(date("Y-m-d", time()));


////

//for($i = 0; $i < 50 ; $i++){
//    echo(((int) (TourManager::Random() * 10))." \n");
//    echo(((int) (TourManager::Random() * 10))." \n \n");
//
//}
//
//die("ddddd");

////



if(!empty($_POST['cities'])){

    echo "Select cities";

}else{






    $pop = new Population(500, true); /// Making 50 chromosomes from cities loaded via tsp file.
    print("Initial distance: " . $pop->getFittest()->getDistance());

// Evolve population for 100 generations
    $pop = GA::evolvePopulation($pop);
    for ($i = 0; $i < 100; $i++) {
        $pop = GA::evolvePopulation($pop);
    }

// Print final results
    print("<br>Finished.");
    print("<br>Final distance: " . $pop->getFittest()->getDistance());
    print("<br>Solution:");
    print($pop->getFittest());
    $from_time = strtotime(date("Y-m-d", time()));

    echo $to_time;
    echo $from_time;
    echo round(abs($from_time - $to_time) / 60,2). " minute";

}


