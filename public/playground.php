<?php

use Illuminate\Support\Collection;

require __DIR__.'/../vendor/autoload.php';

$numbers = new Collection([
    1,2,3,4,5,6,7,8,9,10
]);

// die(var_dump($numbers));

if ($numbers->contains(5)){
    echo 'High Five';
}

// $numbersLessThanFive = $numbers->filter(fn ($number) => $number < 5);
// var_dump($numbersLessThanFive);