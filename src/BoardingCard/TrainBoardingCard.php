<?php
namespace PropertyFinder\BoardingCard;

class TrainBoardingCard extends BaseBoardingCard {

    public function __construct($type, $from, $to, $seat) {
        parent::__construct($type, $from, $to, $seat);
    }
}