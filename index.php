<?php
require "vendor/autoload.php";
use PropertyFinder\PropertyFinder;

/**
 * Input, add your boarding cards here
 */
$input = [
    ['from' => 'Washington', 'to' => 'Tokyo',       'type' => 'Plane',  'seat' => '23D'],
    ['from' => 'New York',   'to' => 'Washington',  'type' => 'Bus',    'seat' => ''],
    ['from' => 'Paris',      'to' => 'Rome',        'type' => 'Plane',  'seat' => '2E'],
    ['from' => 'Francfort',  'to' => 'New York',    'type' => 'Plane',  'seat' => '6E'],
    ['from' => 'Rome',       'to' => 'Francfort',   'type' => 'Plane',  'seat' => '7F'],
    ['from' => 'Barcelona',  'to' => 'Paris',       'type' => 'Train',  'seat' => '19J'],
];

/**
 * Main logic
 */
$propertyFinder = new PropertyFinder($input);
$boardingCards = $propertyFinder->sort();
echo $propertyFinder->print($boardingCards);

/**
 * Helper useful for debugging purposes
 */
function dd($input) {
    die(var_dump($input));
}