<?php


namespace PricelinePn\HotelReviews\Models;


class Review
{
    /** @var int The unique id. */
    public $id;

    /** @var Hotel The hotel the review was for. */
    public $hotel;

    /** @var User The user whos submitted the review. */
    public $user;

    /** @var string|null The review of the hotel. */
    public $text;

    /** @var int The rating, out of 10. */
    public $rating;
}