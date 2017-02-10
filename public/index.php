<?php
require dirname(__FILE__) . "/../vendor/autoload.php";

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

$uriParts = explode('/', $uri);

if ( $uri == "/cornucopia" ) {
    $cornucopiaController = new \PricelinePn\HotelReviews\Controllers\Cornucopia();
    $cornucopiaController->demo();
} else if ( $uri == "/mocking_jay" ) {
    $mockingJayController = new \PricelinePn\HotelReviews\Controllers\MockingJay();
    $mockingJayController->demo();
} else if ( $uriParts[1] == "game_maker" ) {
    $gameMakerController = new \PricelinePn\HotelReviews\Controllers\GameMaker();

    if (count($uriParts) >= 3) {
        if ( $uriParts[2] == 'markdown' ) {
            $gameMakerController->generateMarkdown();
        } else if ( $uriParts[2] == 'swagger' ) {
            $gameMakerController->generateSwagger();
        } else if ( $uriParts[2] == 'mysql' ) {
            $gameMakerController->generateMySql();
        } else if ( $uriParts[2] == 'json' ) {
            $gameMakerController->generateJsonSpec();
        }
    } else {
        $gameMakerController->demo();
    }
} else if ( $uriParts[1] == "jabber_jay" ) {
    $jabberJayController = new \PricelinePn\HotelReviews\Controllers\JabberJay();
    $jabberJayController->demo(join("/", array_slice($uriParts, 2)));
} else if ( $uri == "/peace_keeper" ) {
    $peaceKeeperController = new \PricelinePn\HotelReviews\Controllers\PeaceKeeper();
    $peaceKeeperController->demo();
}