<?php


namespace PricelinePn\HotelReviews\Controllers;


use PricelinePn\HotelReviews\App;
use PricelinePn\HotelReviews\Models\HotelDetailed;

class MockingJay
{
    public function demo() {
        var_dump(App::instance()->mockingJay->mock(HotelDetailed::class));
    }
}