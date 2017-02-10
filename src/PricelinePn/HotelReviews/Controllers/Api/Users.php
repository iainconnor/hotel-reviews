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
use PricelinePn\HotelReviews\Models\User;

/**
 * Class Users
 * @package PricelinePn\HotelReviews\Controllers\Api
 * @API(path=\PricelinePn\HotelReviews\App::API_PATH)
 * @Controller(path="/users")
 * @OutputWrapper(class="\PricelinePn\HotelReviews\Models\OutputWrapper", property="data")
 * @Tag(tags={"Users"})
 */
class Users
{
    /**
     * Logs in an existing user.
     *
     * @POST(path="/login", friendlyName="Login")
     *
     * @param string $username The requested username.
     * @param string $password The requested password.
     *
     * @return string The user's access token.
     */
    public function login($username, $password) {

    }

    /**
     * Signs up a new user.
     *
     * @POST(path="/signup", friendlyName="Signup")
     *
     * @param string $username The requested username.
     * @param string $email The requested email address.
     * @param string $password The requested password.
     *
     * @return User The newly created user.
     */
    public function signup($username, $email, $password) {

    }

    /**
     * Retrieves the currently logged in user.
     *
     * @GET(path="", friendlyName="GetMe")
     * @Tag(tags={"Authenticated"})
     *
     * @Input(in="HEADER")
     * @param string $accessToken The current logged in user's access token.
     *
     * @return User The logged in user.
     */
    public function getCurrentUser($accessToken) {

    }
}