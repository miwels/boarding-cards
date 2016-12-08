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
        $boardingCards = [];

        foreach($this->trips as $trip) {
            $boardingCard = new BoardingCardFactory($trip['type'], $trip['from'], $trip['to'], $trip['seat']);
            $boardingCards[] = $boardingCard->make();
        }

        // find first the start card. This card is the one with a start that
        // doesn't show up in any of the 'end' destinations
        $output = [array_pop($boardingCards)];

        while(count($boardingCards) > 0)
        {
            foreach($boardingCards as $key => $val)
            {
                if(end($output)->getTo() == $val->getFrom()) {
                    array_push($output, $val);
                    unset($boardingCards[$key]);
                }

                if(reset($output)->getFrom() == $val->getTo()) {
                    array_unshift($output, $val);
                    unset($boardingCards[$key]);
                }
            }
        }

        return $output;
    }

    public function print(array $boardingCards)
    {
        foreach($boardingCards as $boardingCard) {
            echo $boardingCard->printTrip();
        }
    }
}