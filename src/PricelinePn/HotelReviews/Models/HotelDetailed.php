<?php


namespace PricelinePn\HotelReviews\Models;


class HotelDetailed extends Hotel
{
    /** @var Review[] All the reviews of the hotel. */
    public $reviews;

    /** @var float|null The average rating from all reviews of the hote, out of 10. */
    public $averageReviewRating;
}