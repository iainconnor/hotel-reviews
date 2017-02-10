<?php


namespace PricelinePn\HotelReviews\Controllers;


use IainConnor\GameMaker\Processors\JsonSchema;
use IainConnor\GameMaker\Processors\Markdown;
use IainConnor\GameMaker\Processors\MySqlSchema;
use IainConnor\GameMaker\Processors\Swagger2;
use PricelinePn\HotelReviews\App;

class GameMaker
{
    public function demo() {
        var_dump ( App::instance()->gameMaker->parseControllersInPath(dirname(__FILE__) . "/Api") );
    }

    public function generateMarkdown() {
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"GameMaker.md\"");

        $markdownProcessor = new Markdown("HotelReviews", "A great microservice for hotel reviews.");
        echo $markdownProcessor->processControllers(App::instance()->gameMaker->parseControllersInPath(dirname(__FILE__) . "/Api"));
    }

    public function generateJsonSpec()
    {
        $zipArchive = new \ZipArchive();
        $zipArchive->open('GameMaker.zip', \ZipArchive::CREATE);

        $jsonSpecProcessor = new JsonSchema("A great microservice for hotel reviews.");
        foreach ( $jsonSpecProcessor->processControllers(App::instance()->gameMaker->parseControllersInPath(dirname(__FILE__) . "/Api")) as $name => $json ) {
            $zipArchive->addFromString($name . '.json', $json);
        }
        $zipArchive->close();

        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: Binary");
        header('Content-Length: ' . filesize("GameMaker.zip"));
        header("Content-disposition: attachment; filename=\"GameMaker.zip\"");

        readfile('GameMaker.zip');
    }

    public function generateMySql()
    {
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"GameMaker.sql\"");

        $sqlProcessor = new MySqlSchema();
        echo $sqlProcessor->processControllers(App::instance()->gameMaker->parseControllersInPath(dirname(__FILE__) . "/Api"));
    }

    public function generateSwagger()
    {
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"GameMaker.json\"");

        $swaggerProcessor = new Swagger2("HotelReviews", "1.0", "A great microservice for hotel reviews.");
        echo $swaggerProcessor->processControllers(App::instance()->gameMaker->parseControllersInPath(dirname(__FILE__) . "/Api"));
    }
}