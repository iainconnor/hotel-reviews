<?php


namespace PricelinePn\HotelReviews\Models;


use IainConnor\MockingJay\Annotations\Mock;

class Hotel
{
    /** @var int The unique id. */
    public $id;

    /**
     * @var string Hotels name.
     * @Mock(fakerProvider="streetName")
     */
    public $name;

    /** @var int|null The star rating, if available. */
    public $starRating;

    /** @var Address The hotels address. */
    public $address;
}