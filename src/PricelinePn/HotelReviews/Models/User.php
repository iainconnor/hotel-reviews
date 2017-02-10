<?php


namespace PricelinePn\HotelReviews\Models;


use IainConnor\MockingJay\Annotations\Mock;

class User
{
    /** @var int The unique id. */
    public $id;

    /**
     * @var string The username.
     * @Mock(fakerProvider="userName")
     */
    public $username;

    /**
     * @var string|null The email address, if available.
     * @Mock(fakerProvider="email")
     */
    private $emailAddress;

    /**
     * @var string The password.
     * @Mock(fakerProvider="password")
     */
    private $password;
}