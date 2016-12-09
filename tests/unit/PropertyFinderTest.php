<?php
use PropertyFinder\PropertyFinder;

class PropertyFinderTest extends \PHPUnit_Framework_TestCase
{
    protected $mainClass;

    protected function setUp()
    {
        $this->mainClass = new PropertyFinder($this->boardingCardsProvider());
    }

    // tests
    public function testMe()
    {
        $boardingCards = $this->mainClass->sort();
        $output = $this->mainClass->print($boardingCards);
        $this->assertEquals($output, $this->expectedResultProvider());
    }

    protected function tearDown()
    {
    }

    public function boardingCardsProvider() {
        return [
            ['from' => 'Washington', 'to' => 'Tokyo',       'type' => 'Plane',  'seat' => '23D'],
            ['from' => 'New York',   'to' => 'Washington',  'type' => 'Bus',    'seat' => ''],
            ['from' => 'Paris',      'to' => 'Rome',        'type' => 'Plane',  'seat' => '2E'],
            ['from' => 'Francfort',  'to' => 'New York',    'type' => 'Plane',  'seat' => '6E'],
            ['from' => 'Rome',       'to' => 'Francfort',   'type' => 'Plane',  'seat' => '7F'],
            ['from' => 'Barcelona',  'to' => 'Paris',       'type' => 'Train',  'seat' => '19J'],
        ];
    }

    public function expectedResultProvider() {
        return "Take the train from Barcelona to Paris. Seat 19J
Take the plane from Paris to Rome. Seat 2E
Take the plane from Rome to Francfort. Seat 7F
Take the plane from Francfort to New York. Seat 6E
Take the bus from New York to Washington. No seat allocated
Take the plane from Washington to Tokyo. Seat 23D
";
    }
}
