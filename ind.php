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



//define("DATA_PATH", "data".DIRECTORY_SEPARATOR."geom");


$time1 = time();
$time2 = time();

$difference = $time1 - $time2;

die($difference);


if(!empty($_POST['cities'])){

    echo "Select cities";

}else{






    $pop = new Population(50, true);
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

}


