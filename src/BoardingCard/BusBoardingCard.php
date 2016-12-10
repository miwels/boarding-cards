<?php
namespace PropertyFinder\BoardingCard;

use PropertyFinder\BoardingCard\BaseBoardingCard;

class BusBoardingCard extends BaseBoardingCard {

	/**
	 * @param string $type
	 * @param string $from
	 * @param string $to
	 * @param string $seat
	 */
    public function __construct(string $type, string $from, string $to, string $seat) {
        parent::__construct($type, $from, $to, $seat);
    }
}