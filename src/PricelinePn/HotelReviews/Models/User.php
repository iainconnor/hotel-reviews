<?php


namespace PricelinePn\HotelReviews\Models;


class User
{
    /** @var int The unique id. */
    public $id;

    /** @var string The username. */
    public $username;

    /** @var string|null The email address, if available. */
    private $emailAddress;

    /** @var string The password. */
    private $password;
}