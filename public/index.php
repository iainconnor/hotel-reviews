<?php
require dirname(__FILE__) . "/../vendor/autoload.php";

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if ( $uri == "/cornucopia" ) {
    $cornucopiaController = new \PricelinePn\HotelReviews\Controllers\Cornucopia();
    $cornucopiaController->demo();
} else if ( $uri == "/mocking_jay" ) {
    $mockingJayController = new \PricelinePn\HotelReviews\Controllers\MockingJay();
    $mockingJayController->demo();
}