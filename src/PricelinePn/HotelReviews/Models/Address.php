<?php


namespace PricelinePn\HotelReviews\Models;


class Address
{
    /** @var string The first line of the address. */
    public $lineOne;

    /** @var string|null The optional second line of the address. */
    public $lineTwo;

    /** @var State The state. */
    public $state;

    /** @var Country The country. */
    public $country;

    /** @var string The city. */
    public $city;
}