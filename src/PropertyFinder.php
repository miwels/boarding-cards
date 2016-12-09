<?php
namespace PropertyFinder;
use PropertyFinder\BoardingCard\Factory\BoardingCardFactory;

class PropertyFinder
{
    protected $trips;
    protected $boardingCards;

    public function __construct(array $trips)
    {
        $this->trips = $trips;
        $this->boardingCards = $this->factorize();
    }

    /**
     * Converts our input into objects using our Factory class
     */
    public function factorize()
    {
        foreach($this->trips as $trip) {
            $boardingCard = new BoardingCardFactory($trip['type'],
                                                    $trip['from'],
                                                    $trip['to'],
                                                    $trip['seat']);

            $this->boardingCards[] = $boardingCard->make();
        }

        return $this->boardingCards;
    }

    /**
     * Sorts boarding cards
     */
    public function sort()
    {
        $boardingCards = $this->boardingCards;
        $output = [array_pop($boardingCards)];

        while(count($boardingCards) > 0)
        {
            foreach($boardingCards as $key => $val)
            {
                if(end($output)->getTo() == $val->getFrom()) {
                    $output[] = $val;
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

    /**
     * Prints all object properties
     */
    public function print(array $boardingCards)
    {
        $output = "";
        foreach($boardingCards as $boardingCard) {
            $output .= $boardingCard->printTrip();
        }
        return $output;
    }
}