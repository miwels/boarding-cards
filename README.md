# boarding-cards
This technical test has been created from scratch using just PHP 5.3+ features (no PHP7 features like function return types).

In order to build the tests we have used the **codeception** test tool.

To deploy simply do:

    git clone git@github.com:miwels/boarding-cards.git
	cd boarding-cards
	composer install
	alias codecept='./vendor/bin/codecept'

The application entry point is **index.php**. We have included a default input but you can add your own ownes. We have assumed that all boarding cards have a type, start and end but the seat is optional.

In order to build the tests we have used the same input from the index.php but obviously this can be changed.

The main class has 3 method from which 2 of them are optional

    sort(): returns the sorted boarding cards
    print(): returns a readable output.

The factorize() method is called when the class is instantiated and turns the input into objects using the Factory pattern.

We have also considered that all boarding cards have the same methods (defined in the base class) but we have splitted each boarding card into a class in case you want to add your own custom methods for each boarding cards (i.e. PlaneBoardingCard::checkFood())

To run the application:

	php index.php

To run the tests
	
	codeception run