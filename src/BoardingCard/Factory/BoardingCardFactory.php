<?php
namespace PropertyFinder\BoardingCard\Factory;

use PropertyFinder\BoardingCard\BusBoardingCard;
use PropertyFinder\BoardingCard\TrainBoardingCard;
use PropertyFinder\BoardingCard\PlaneBoardingCard;

class BoardingCardFactory
{
    const TRAIN = "train";
    const BUS   = "bus";
    const PLANE = "plane";

    protected $type;
    protected $from;
    protected $to;
    protected $seat;

    public function __construct(
        string $type,
        string $from,
        string $to,
        string $seat) {
        $this->type = strtolower($type);
        $this->from = $from;
        $this->to   = $to;
        $this->seat = $seat;
    }

    public function make() {
        switch($this->type) {
            case self::TRAIN:
                return new TrainBoardingCard($this->type, $this->from, $this->to, $this->seat);
                break;
            case self::BUS:
                return new BusBoardingCard($this->type, $this->from, $this->to, $this->seat);
                break;
            case self::PLANE:
                return new PlaneBoardingCard($this->type, $this->from, $this->to, $this->seat);
                break;
        }
    }
}