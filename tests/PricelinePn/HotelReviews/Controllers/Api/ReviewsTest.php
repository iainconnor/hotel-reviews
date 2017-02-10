<?php
namespace PricelinePn\HotelReviews\Controllers\Api;

class ReviewsTest extends \PHPUnit\Framework\TestCase
{
    protected static $mockingJay;
    protected static $jabberJay;
    protected static $gameMaker;
    protected static $controller;

    public static function setUpBeforeClass()
    {
        static::$mockingJay = \IainConnor\MockingJay\MockingJay::instance();
        static::$gameMaker = \IainConnor\GameMaker\GameMaker::instance();
        static::$controller = static::$gameMaker->parseController("PricelinePn\\HotelReviews\\Controllers\\Api\\Reviews");
        static::$jabberJay = \IainConnor\JabberJay\JabberJay::instance(static::$gameMaker);
        static::$jabberJay->addController(static::$controller);
    }

    public function testUpdateReviewById()
    {
        // Find endpoint to call.
        $endpoint = null;
        foreach ( static::$controller->endpoints as $searchEndpoint ) {
        	if ( $searchEndpoint->httpMethod->path == "http://localhost:1234/rest_api/reviews/{id}" ) {
        		$endpoint = $searchEndpoint;
        		break;
        	}
        }

        // Call endpoint.
        $response = \IainConnor\PeaceKeeper\Drivers\UnitTest::driveRequest(static::$jabberJay, static::$controller, $endpoint, static::$jabberJay->getMockInputsForMethodForEndpoint($endpoint));

        // Get all the JSON schemas for the controller.
        $jsonSchemaProcessor = new \IainConnor\GameMaker\Processors\JsonSchema("updateReviewById");
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

    public function testSubmitReviewForHotelId()
    {
        // Find endpoint to call.
        $endpoint = null;
        foreach ( static::$controller->endpoints as $searchEndpoint ) {
        	if ( $searchEndpoint->httpMethod->path == "http://localhost:1234/rest_api/reviews" ) {
        		$endpoint = $searchEndpoint;
        		break;
        	}
        }

        // Call endpoint.
        $response = \IainConnor\PeaceKeeper\Drivers\UnitTest::driveRequest(static::$jabberJay, static::$controller, $endpoint, static::$jabberJay->getMockInputsForMethodForEndpoint($endpoint));

        // Get all the JSON schemas for the controller.
        $jsonSchemaProcessor = new \IainConnor\GameMaker\Processors\JsonSchema("submitReviewForHotelId");
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

    public function testGetReviewsForHotelId()
    {
        // Find endpoint to call.
        $endpoint = null;
        foreach ( static::$controller->endpoints as $searchEndpoint ) {
        	if ( $searchEndpoint->httpMethod->path == "http://localhost:1234/rest_api/reviews/hotel/{id}" ) {
        		$endpoint = $searchEndpoint;
        		break;
        	}
        }

        // Call endpoint.
        $response = \IainConnor\PeaceKeeper\Drivers\UnitTest::driveRequest(static::$jabberJay, static::$controller, $endpoint, static::$jabberJay->getMockInputsForMethodForEndpoint($endpoint));

        // Get all the JSON schemas for the controller.
        $jsonSchemaProcessor = new \IainConnor\GameMaker\Processors\JsonSchema("getReviewsForHotelId");
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

    public function testGetReviewById()
    {
        // Find endpoint to call.
        $endpoint = null;
        foreach ( static::$controller->endpoints as $searchEndpoint ) {
        	if ( $searchEndpoint->httpMethod->path == "http://localhost:1234/rest_api/reviews/{id}" ) {
        		$endpoint = $searchEndpoint;
        		break;
        	}
        }

        // Call endpoint.
        $response = \IainConnor\PeaceKeeper\Drivers\UnitTest::driveRequest(static::$jabberJay, static::$controller, $endpoint, static::$jabberJay->getMockInputsForMethodForEndpoint($endpoint));

        // Get all the JSON schemas for the controller.
        $jsonSchemaProcessor = new \IainConnor\GameMaker\Processors\JsonSchema("getReviewById");
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

    public function testGetAllReviews()
    {
        // Find endpoint to call.
        $endpoint = null;
        foreach ( static::$controller->endpoints as $searchEndpoint ) {
        	if ( $searchEndpoint->httpMethod->path == "http://localhost:1234/rest_api/reviews" ) {
        		$endpoint = $searchEndpoint;
        		break;
        	}
        }

        // Call endpoint.
        $response = \IainConnor\PeaceKeeper\Drivers\UnitTest::driveRequest(static::$jabberJay, static::$controller, $endpoint, static::$jabberJay->getMockInputsForMethodForEndpoint($endpoint));

        // Get all the JSON schemas for the controller.
        $jsonSchemaProcessor = new \IainConnor\GameMaker\Processors\JsonSchema("getAllReviews");
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

    public function testDeleteReviewById()
    {
        // Find endpoint to call.
        $endpoint = null;
        foreach ( static::$controller->endpoints as $searchEndpoint ) {
        	if ( $searchEndpoint->httpMethod->path == "http://localhost:1234/rest_api/reviews/{id}" ) {
        		$endpoint = $searchEndpoint;
        		break;
        	}
        }

        // Call endpoint.
        $response = \IainConnor\PeaceKeeper\Drivers\UnitTest::driveRequest(static::$jabberJay, static::$controller, $endpoint, static::$jabberJay->getMockInputsForMethodForEndpoint($endpoint));

        // Get all the JSON schemas for the controller.
        $jsonSchemaProcessor = new \IainConnor\GameMaker\Processors\JsonSchema("deleteReviewById");
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