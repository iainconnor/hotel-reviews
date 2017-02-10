<?php


namespace PricelinePn\HotelReviews\Controllers\Api;

use IainConnor\GameMaker\Annotations\API;
use IainConnor\GameMaker\Annotations\Controller;
use IainConnor\GameMaker\Annotations\OutputWrapper;
use PricelinePn\HotelReviews\Models\Hotel;
use PricelinePn\HotelReviews\Models\HotelDetailed;

/**
 * Class Hotels
 * @package PricelinePn\HotelReviews\Controllers\Api
 * @API(path=\PricelinePn\HotelReviews\App::API_PATH)
 * @Controller(path="/hotels")
 * @OutputWrapper(class="\PricelinePn\HotelReviews\Models\OutputWrapper", property="data")
 */
class Hotels
{
    /**
     * Returns a specific hotel, requested by it's id.
     *
     * @param int $id
     * @return HotelDetailed
     */
    public function getHotelById($id) {

    }

    /**
     * Returns all hotels.
     * @return Hotel[]
     */
    public function getHotels() {

    }
}