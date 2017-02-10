<?php


namespace PricelinePn\HotelReviews\Controllers\Api;

use IainConnor\GameMaker\Annotations\API;
use IainConnor\GameMaker\Annotations\Controller;
use IainConnor\GameMaker\Annotations\DELETE;
use IainConnor\GameMaker\Annotations\GET;
use IainConnor\GameMaker\Annotations\IgnoreOutputWrapper;
use IainConnor\GameMaker\Annotations\Input;
use IainConnor\GameMaker\Annotations\Output;
use IainConnor\GameMaker\Annotations\OutputWrapper;
use IainConnor\GameMaker\Annotations\POST;
use IainConnor\GameMaker\Annotations\Tag;
use PricelinePn\HotelReviews\Models\Review;

/**
 * Class Reviews
 * @package PricelinePn\HotelReviews\Controllers\Api
 * @API(path=\PricelinePn\HotelReviews\App::API_PATH)
 * @Controller(path="/reviews")
 * @OutputWrapper(class="\PricelinePn\HotelReviews\Models\OutputWrapper", property="data")
 * @Tag(tags={"Reviews"})
 */
class Reviews
{
    /**
     * Gets a specific review by it's id.
     *
     * @GET(path="/{id}", friendlyName="GetReview")
     *
     * @param int $id The review id.
     * @return Review
     */
    public function getReviewById($id) {

    }

    /**
     * Gets all reviews.
     *
     * @GET(path="/", friendlyName="GetReviews")
     *
     * @Input(enum={"recent", "oldest", "highest", "lowest"})
     * @param string $order The sort order for the returned reviews.
     *
     * @return Review[]
     */
    public function getAllReviews($order = "recent") {

    }

    /**
     * Gets all reviews for a hotel.
     *
     * @GET(path="/hotel/{id}", friendlyName="GetReviewsForHotel")
     *
     * @Input(in="PATH")
     * @param int $id The hotel's id.
     *
     * @Input(enum={"recent", "oldest", "highest", "lowest"})
     * @param string $order The sort order for the returned reviews.
     *
     * @return Review[]
     */
    public function getReviewsForHotelId($id, $order = "recent") {

    }

    /**
     * Submits a review.
     *
     * @POST(path="/", friendlyName="SubmitReview")
     * @Tag(tags={"Authenticated"})
     *
     * @Input(in="FORM", name="hotel_id")
     * @param int $id The hotel's id.
     *
     * @param int $rating The rating, out of 10.
     *
     * @Input(in="HEADER")
     * @param string $accessToken The current logged in user's access token.
     *
     * @param string|null $text Optional detailed text.
     *
     * @Output(statusCode=201)
     * @return Review The newly created review.
     */
    public function submitReviewForHotelId($id, $rating, $accessToken, $text = null) {

    }

    /**
     * Updates a review.
     *
     * @POST(path="/{id}", friendlyName="UpdateReview")
     * @Tag(tags={"Authenticated"})
     *
     * @Input(name="id", in="PATH")
     * @param int $reviewId The review id to update.
     *
     * @param int $hotelId The hotel's id.
     *
     * @param int|null $rating The rating, out of 10.
     *
     * @Input(in="HEADER")
     * @param string $accessToken The current logged in user's access token.
     *
     * @param string|null $text Optional detailed text.
     *
     * @Output(statusCode=202)
     * @return Review The updated review.
     */
    public function updateReviewById($reviewId, $hotelId, $rating, $accessToken, $text = null) {

    }

    /**
     * Deletes a review.
     *
     * @DELETE(path="/{id}", friendlyName="DeleteReview")
     * @Tag(tags={"Authenticated"})
     *
     * @param int $reviewId The review id to delete.
     *
     * @Output(statusCode=204)
     * @IgnoreOutputWrapper()
     * @return null
     */
    public function deleteReviewById($reviewId) {

    }
}