<?php


namespace PricelinePn\HotelReviews\Controllers;


use PricelinePn\HotelReviews\App;
use Symfony\Component\HttpFoundation\Request;

class JabberJay
{

    public function demo($route)
    {
        $controllers = App::instance()->gameMaker->parseControllersInPath(dirname(__FILE__) . "/Api");

        $jabberJay = App::instance()->jabberJay;
        $jabberJay->addControllers($controllers);

        $response = $jabberJay->performRequest(Request::create(App::API_PATH . '/' . $route));
        foreach ( $response->headers->all() as $key => $header ) {
            header($key . ": " . $header[0]);
        }

        echo $response->getContent();
    }
}