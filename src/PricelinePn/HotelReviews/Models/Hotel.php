<?php


namespace PricelinePn\HotelReviews\Models;


class Hotel
{
    /** @var int The unique id. */
    public $id;

    /** @var string The hotels name. */
    public $name;

    /** @var int|null The star rating, if available. */
    public $starRating;

    /** @var Address The hotels address. */
    public $address;
}