<?php
namespace PropertyFinder\BoardingCard;

use PropertyFinder\BoardingCard\BaseBoardingCard;

class PlaneBoardingCard extends BaseBoardingCard {

    public function __construct($type, $from, $to, $seat) {
        parent::__construct($type, $from, $to, $seat);
    }
}