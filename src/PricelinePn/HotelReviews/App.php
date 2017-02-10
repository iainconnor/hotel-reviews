<?php


namespace PricelinePn\HotelReviews;


use Doctrine\Common\Cache\ArrayCache;
use IainConnor\Cornucopia\AnnotationReader;
use IainConnor\Cornucopia\CachedReader;
use IainConnor\GameMaker\GameMaker;
use IainConnor\JabberJay\JabberJay;
use IainConnor\MockingJay\MockingJay;

class App
{
    const DOMAIN = "http://localhost:1234";
    const API_PATH = App::DOMAIN . "/rest_api";

    /** @var App */
    public static $instance;

    /** @var CachedReader */
    public $cornucopia;

    /** @var MockingJay */
    public $mockingJay;

    /** @var GameMaker */
    public $gameMaker;

    /** @var JabberJay */
    public $jabberJay;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->cornucopia = new CachedReader(
            new AnnotationReader(),
            new ArrayCache()
        );

        $this->mockingJay = MockingJay::instance();
        $this->mockingJay->setAnnotationReader(
            $this->cornucopia
        );

        $this->gameMaker = GameMaker::instance();
        $this->gameMaker->setAnnotationReader(
            $this->cornucopia
        );

        $this->jabberJay = new JabberJay($this->gameMaker, $this->mockingJay);
    }

    public static function instance() {
        if ( static::$instance == null ) {
            static::$instance = new App();
        }

        return static::$instance;
    }
}