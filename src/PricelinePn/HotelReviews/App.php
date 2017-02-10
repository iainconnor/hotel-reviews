<?php


namespace PricelinePn\HotelReviews;


use Doctrine\Common\Cache\ArrayCache;
use IainConnor\Cornucopia\AnnotationReader;
use IainConnor\Cornucopia\CachedReader;

class App
{
    /** @var App */
    public static $instance;

    /** @var CachedReader */
    public $cornucopia;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->cornucopia = new CachedReader(
            new AnnotationReader(),
            new ArrayCache()
        );
    }

    public static function instance() {
        if ( static::$instance == null ) {
            static::$instance = new App();
        }

        return static::$instance;
    }
}