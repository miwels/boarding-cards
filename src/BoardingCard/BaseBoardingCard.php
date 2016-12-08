<?php
namespace PropertyFinder\BoardingCard;
use PropertyFinder\BoardingCard\BoardingCardInterface;

class BaseBoardingCard implements BoardingCardInterface {
    protected $type;
    protected $from;
    protected $to;
    protected $seat;

    public function __construct(string $type, string $from, string $to, string $seat) {
        $this->type = $type;
        $this->from = $from;
        $this->to   = $to;
        $this->seat = $seat;
    }

    public function getFrom() {
        return $this->from;
    }

    public function getTo() {
        return $this->to;
    }

    public function getSeat() {
        return $this->seat;
    }

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