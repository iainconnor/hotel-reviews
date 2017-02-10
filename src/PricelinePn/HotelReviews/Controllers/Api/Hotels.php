<?php


namespace PricelinePn\HotelReviews\Controllers\Api;

use IainConnor\GameMaker\Annotations\API;
use IainConnor\GameMaker\Annotations\Controller;
use IainConnor\GameMaker\Annotations\GET;
use IainConnor\GameMaker\Annotations\OutputWrapper;
use IainConnor\GameMaker\Annotations\Tag;
use PricelinePn\HotelReviews\Models\Hotel;
use PricelinePn\HotelReviews\Models\HotelDetailed;

/**
 * Class Hotels
 * @package PricelinePn\HotelReviews\Controllers\Api
 * @API(path=\PricelinePn\HotelReviews\App::API_PATH)
 * @Controller(path="/hotels")
 * @Tag(tags={"Hotels"})
 */
class Hotels
{
    /**
     * Returns a specific hotel, requested by it's id.
     *
     * @GET(path="/{id}")
     *
     * @param int $id The hotel id.
     * @return HotelDetailed The requested hotel.
     */
    public function getHotelById($id) {

    }

    /**
     * Returns all hotels.
     *
     * @GET(path="")
     *
     * @return Hotel[] All the hotels.
     */
    public function getHotels() {

    }
}