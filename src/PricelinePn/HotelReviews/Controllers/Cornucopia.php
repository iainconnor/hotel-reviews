<?php


namespace PricelinePn\HotelReviews\Controllers;


use PricelinePn\HotelReviews\App;
use PricelinePn\HotelReviews\Models\HotelDetailed;

class Cornucopia
{
    public function demo() {
        $reflectedClass = new \ReflectionClass(HotelDetailed::class);

        foreach ($reflectedClass->getProperties() as $reflectedProperty) {
            foreach (App::instance()->cornucopia->getPropertyAnnotations($reflectedProperty) as $propertyAnnotation) {
                var_dump ( $propertyAnnotation );
            }
        }
    }
}