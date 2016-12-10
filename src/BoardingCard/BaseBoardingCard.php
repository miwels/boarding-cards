<?php
namespace PropertyFinder\BoardingCard;
use PropertyFinder\BoardingCard\BoardingCardInterface;

/**
 * Base class. All our Boarding Cards extend from this method. Due to the fact that
 * all classes are the same we don't need to declare any extra methods in the individual
 * classes (train, bus, etc.)
 */
class BaseBoardingCard implements BoardingCardInterface {
    protected $type;
    protected $from;
    protected $to;
    protected $seat;

    /**
     * @param string $type  Type of boarding card
     * @param string $from  Start city
     * @param string $to    End city
     * @param string $seat  Allocated seat
     */
    public function __construct(string $type, string $from, string $to, string $seat) {
        $this->type = $type;
        $this->from = $from;
        $this->to   = $to;
        $this->seat = $seat;
    }

    /**
     * From getter
     * @return string
     */
    public function getFrom() {
        return $this->from;
    }

    /**
     * To getter
     * @return string
     */
    public function getTo() {
        return $this->to;
    }

    /**
     * Seat getter
     * @return string
     */
    public function getSeat() {
        return $this->seat;
    }

    /**
     * Type getter
     * @return string
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Prints the journey in a human-readable format. This method can be abstracted in
     * individual methods exclusive for each boarding card but I have prefer to keep it
     * simple and make a generic method.
     * 
     * @return string
     */
    public function printTrip() {
        $output = "Take the " . $this->type . " from " . $this->getFrom() . " to " . $this->getTo();

        if(!$this->getSeat()) {
            $output .= ". No seat allocated";
        }
        else {
            $output .= ". Seat " . $this->getSeat();
        }

        $output .= "\n";

        return $output;
    }
}