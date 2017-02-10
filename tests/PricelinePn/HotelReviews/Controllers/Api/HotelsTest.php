<?php
namespace PricelinePn\HotelReviews\Controllers\Api;

class HotelsTest extends \PHPUnit\Framework\TestCase
{
    protected static $mockingJay;
    protected static $jabberJay;
    protected static $gameMaker;
    protected static $controller;

    public static function setUpBeforeClass()
    {
        static::$mockingJay = \IainConnor\MockingJay\MockingJay::instance();
        static::$gameMaker = \IainConnor\GameMaker\GameMaker::instance();
        static::$controller = static::$gameMaker->parseController("PricelinePn\\HotelReviews\\Controllers\\Api\\Hotels");
        static::$jabberJay = \IainConnor\JabberJay\JabberJay::instance(static::$gameMaker);
        static::$jabberJay->addController(static::$controller);
    }

    public function testGetHotels()
    {
        // Find endpoint to call.
        $endpoint = null;
        foreach ( static::$controller->endpoints as $searchEndpoint ) {
        	if ( $searchEndpoint->httpMethod->path == "http://localhost:1234/rest_api/hotels" ) {
        		$endpoint = $searchEndpoint;
        		break;
        	}
        }

        // Call endpoint.
        $response = \IainConnor\PeaceKeeper\Drivers\UnitTest::driveRequest(static::$jabberJay, static::$controller, $endpoint, static::$jabberJay->getMockInputsForMethodForEndpoint($endpoint));

        // Get all the JSON schemas for the controller.
        $jsonSchemaProcessor = new \IainConnor\GameMaker\Processors\JsonSchema("getHotels");
        $jsonSchemas = $jsonSchemaProcessor->processController(static::$controller);

        // Locate the matching JSON schema.
        $foundValidSchema = false;
        foreach ( $endpoint->outputs as $output ) {
        	// Status codes have to match.
        	if ( $response->getStatusCode() == $output->statusCode ) {
        		foreach ( $output->typeHint->types as $type ) {
        			// JSON schema for output type has to exist.
        			$jsonSchemaKey = $type->type == \IainConnor\Cornucopia\Annotations\TypeHint::ARRAY_TYPE ? ($type->genericType . \IainConnor\Cornucopia\Annotations\TypeHint::ARRAY_TYPE_SHORT) : $type->type;
        			if ( array_key_exists($jsonSchemaKey, $jsonSchemas) ) {
        				$jsonSchema = $jsonSchemas[$jsonSchemaKey];
        				$validator = new \JsonSchema\Validator();
        				$validator->check(json_decode($response->getContent()), $jsonSchema);
        				if ( $validator->isValid() ) {
        					$foundValidSchema = true;
        					break(2);
        				}
        			} else if ( $type->type == null && $response->getContent() == null ) {
        				$foundValidSchema = true;
        				break(2);
        			}
        		}
        	}
        }

        if ( !$foundValidSchema ) {
        	fwrite(STDERR, print_r($response, TRUE));
        }

        $this->assertTrue($foundValidSchema);
    }

    public function testGetHotelById()
    {
        // Find endpoint to call.
        $endpoint = null;
        foreach ( static::$controller->endpoints as $searchEndpoint ) {
        	if ( $searchEndpoint->httpMethod->path == "http://localhost:1234/rest_api/hotels/{id}" ) {
        		$endpoint = $searchEndpoint;
        		break;
        	}
        }

        // Call endpoint.
        $response = \IainConnor\PeaceKeeper\Drivers\UnitTest::driveRequest(static::$jabberJay, static::$controller, $endpoint, static::$jabberJay->getMockInputsForMethodForEndpoint($endpoint));

        // Get all the JSON schemas for the controller.
        $jsonSchemaProcessor = new \IainConnor\GameMaker\Processors\JsonSchema("getHotelById");
        $jsonSchemas = $jsonSchemaProcessor->processController(static::$controller);

        // Locate the matching JSON schema.
        $foundValidSchema = false;
        foreach ( $endpoint->outputs as $output ) {
        	// Status codes have to match.
        	if ( $response->getStatusCode() == $output->statusCode ) {
        		foreach ( $output->typeHint->types as $type ) {
        			// JSON schema for output type has to exist.
        			$jsonSchemaKey = $type->type == \IainConnor\Cornucopia\Annotations\TypeHint::ARRAY_TYPE ? ($type->genericType . \IainConnor\Cornucopia\Annotations\TypeHint::ARRAY_TYPE_SHORT) : $type->type;
        			if ( array_key_exists($jsonSchemaKey, $jsonSchemas) ) {
        				$jsonSchema = $jsonSchemas[$jsonSchemaKey];
        				$validator = new \JsonSchema\Validator();
        				$validator->check(json_decode($response->getContent()), $jsonSchema);
        				if ( $validator->isValid() ) {
        					$foundValidSchema = true;
        					break(2);
        				}
        			} else if ( $type->type == null && $response->getContent() == null ) {
        				$foundValidSchema = true;
        				break(2);
        			}
        		}
        	}
        }

        if ( !$foundValidSchema ) {
        	fwrite(STDERR, print_r($response, TRUE));
        }

        $this->assertTrue($foundValidSchema);
    }
}