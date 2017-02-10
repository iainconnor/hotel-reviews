<?php


namespace PricelinePn\HotelReviews\Controllers;


use CG\Core\DefaultGeneratorStrategy;
use PricelinePn\HotelReviews\App;

class PeaceKeeper
{

    public function demo()
    {
        $controllers = App::instance()->gameMaker->parseControllersInPath(dirname(__FILE__) . "/Api");

        $strategy = new DefaultGeneratorStrategy();

        foreach ( App::instance()->peaceKeeper->generateTestClassesForControllers($controllers) as $class ) {
            $testClass = dirname(__FILE__) . "/../../../../tests/" . str_replace('\\', '/', $class->getName()) . ".php";
            if ( !is_dir(pathinfo($testClass)['dirname']) ) {
                mkdir(pathinfo($testClass)['dirname'], 0777, true);
            }

            file_put_contents($testClass, "<?php" . PHP_EOL . $strategy->generate($class));

            echo "<pre>";
            echo "Testing " . $class->getShortName() . PHP_EOL;
            exec(dirname(__FILE__) . "/../../../../vendor/bin/phpunit " . $testClass . " --bootstrap " . dirname(__FILE__) . "/../../../../vendor/autoload.php", $output);
            echo join(PHP_EOL, $output);
            echo PHP_EOL;
            echo "</pre>";
        }
    }
}