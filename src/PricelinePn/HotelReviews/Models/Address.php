<?php


namespace PricelinePn\HotelReviews\Models;


use IainConnor\MockingJay\Annotations\Mock;

class Address
{
    /**
     * @var string The first line of the address.
     * @Mock(fakerProvider="streetAddress")
     */
    public $lineOne;

    /**
     * @var string|null The optional second line of the address.
     * @Mock(fakerProvider="secondaryAddress")
     */
    public $lineTwo;

    /** @var State The state. */
    public $state;

    /** @var Country The country. */
    public $country;

    /**
     * @var string The city.
     * @Mock(fakerProvider="city")
     */
    public $city;
}