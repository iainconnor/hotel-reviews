<?php


namespace PricelinePn\HotelReviews\Controllers;


use PricelinePn\HotelReviews\App;

class GameMaker
{
    public function demo() {
        var_dump ( App::instance()->gameMaker->parseControllersInPath(dirname(__FILE__) . "/Api") );
    }
}