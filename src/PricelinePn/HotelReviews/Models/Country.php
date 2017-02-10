<?php


namespace PricelinePn\HotelReviews\Models;


use IainConnor\MockingJay\Annotations\Mock;

class Country
{
    /** @var int The unique id. */
    public $id;

    /**
     * @var string The country code.
     * @Mock(fakerProvider="countryCode")
     */
    public $code;

    /**
     * @var string The country name.
     * @Mock(fakerProvider="country")
     */
    public $name;
}