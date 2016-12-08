<?php
require "vendor/autoload.php";
use PropertyFinder\PropertyFinder;

$input = [
    ['from' => 'Barcelona', 'to' => 'Paris', 'type' => 'Train', 'seat' => '19J'],
    ['from' => 'Paris', 'to' => 'Rome', 'type' => 'Plane', 'seat' => '2E'],
    ['from' => 'Rome', 'to' => 'Francfort', 'type' => 'Plane', 'seat' => '7F'],
    ['from' => 'Francfort', 'to' => 'New York', 'type' => 'Plane', 'seat' => '6E'],
    ['from' => 'New York', 'to' => 'Washington', 'type' => 'Bus', 'seat' => ''],
];

$propertyFinder = new PropertyFinder($input);
$propertyFinder->sort();

function dd($input) {
    die(var_dump($input));
}