<?php
use PropertyFinder\BoardingCard\Factory\BoardingCardFactory;
use PropertyFinder\BoardingCard\BusBoardingCard;
use PropertyFinder\BoardingCard\TrainBoardingCard;
use PropertyFinder\BoardingCard\PlaneBoardingCard;

class BoardingCardFactoryTest extends \PHPUnit_Framework_TestCase
{
    protected $trainCard;
    protected $busCard;
    protected $planeCard;

    protected function setUp()
    {
        $this->trainCard = new BoardingCardFactory('train', 'start', 'end', 'seat');
        $this->busCard   = new BoardingCardFactory('bus', 'start', 'end', 'seat');
        $this->planeCard = new BoardingCardFactory('plane', 'start', 'end', 'seat');
    }

    // tests
    public function testMe()
    {
        $this->assertTrue($this->trainCard->make() instanceof TrainBoardingCard);
        $this->assertTrue($this->planeCard->make() instanceof PlaneBoardingCard);
        $this->assertTrue($this->busCard->make() instanceof BusBoardingCard);
    }

    protected function tearDown()
    {
    }
}
