<?php


namespace PricelinePn\HotelReviews\Models;


use IainConnor\MockingJay\Annotations\Mock;

class Review
{
    /** @var int The unique id. */
    public $id;

    /** @var Hotel The hotel the review was for. */
    public $hotel;

    /** @var User The user whos submitted the review. */
    public $user;

    /**
     * @var string|null The review of the hotel.
     * @Mock(fakerProvider="paragraph")
     */
    public $text;

    /** @var int The rating, out of 10. */
    public $rating;
}