<?php
namespace PropertyFinder\BoardingCard;

use PropertyFinder\BoardingCard\BaseBoardingCard;

class BusBoardingCard extends BaseBoardingCard {

    public function __construct($type, $from, $to, $seat) {
        parent::__construct($type, $from, $to, $seat);
    }
}