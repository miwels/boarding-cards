<?php
namespace PropertyFinder;
use PropertyFinder\BoardingCard\Factory\BoardingCardFactory;

class PropertyFinder
{
    protected $trips;

    public function __construct(array $trips) {
        $this->trips = $trips;
    }

    public function sort()
    {
        $sortedTrips = [];
        $i = 0;
        $tripsArr = [];

        foreach($this->trips as $trip) {
            $boardingCard = new BoardingCardFactory($trip['type'], $trip['from'], $trip['to'], $trip['seat']);
            $tripsArr[] = $boardingCard->make();
        }

        foreach($tripsArr as $boardingCard) {
            echo $boardingCard->printTrip();
        }

        /*
        while($i < count($this->$trips)) {
            $currentTrip = $this->$trips[$i];
        }
        */
    }
}