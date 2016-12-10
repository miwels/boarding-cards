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
     *
     * @return array an array of boarding cards
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
     *
     * @return array an array of sorted boarding cards
     */
    public function sort()
    {
        $boardingCards = $this->boardingCards;

        // start with the first element and keep checking each of them until we
        // find a match in the start-end
        $output[] = $boardingCards[0];
        unset($boardingCards[0]);

        while(count($boardingCards) > 0)
        {
            foreach($boardingCards as $key => $val)
            {
                // cound from the end, once we find a match store it and remove it
                // from our collection
                if(end($output)->getTo() == $val->getFrom()) {
                    $output[] = $val;
                    unset($boardingCards[$key]);
                }

                // reset the pointer
                if(reset($output)->getFrom() == $val->getTo()) {
                    array_unshift($output, $val);
                    unset($boardingCards[$key]);
                }
            }
        }

        return $output;
    }

    /**
     * Converts the output in something readable by users
     *
     * @param array $boardingCards takes an array of boardingCards and prints the journey
     * @return string
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