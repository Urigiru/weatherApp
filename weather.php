<?php

use DI\DependencyException;
use DI\NotFoundException;
use WeatherApp\Infrastructure\Controllers\WeatherAppController;

/**
 * The bootstrapper and entry point for the application.
 * It's role is to load up the dependency container and fire up the controller which will
 * handle the request
 */

include "vendor/autoload.php";

try {

    $dependencyContainer = new DI\Container();
    /**
     * @var WeatherAppController $controller
     */
    $controller = $dependencyContainer->get(WeatherAppController::class);
    $controller->getCurrentWeather($argv);

} catch (DependencyException | NotFoundException $exception) {
    die (
        'There were problems with running the application. ' . PHP_EOL .
        'You might need to look out of the window or even go outside to check the weather.' . PHP_EOL .
        'Sorry for the inconvenience' . PHP_EOL .
        'Reason for the crash:' . $exception->getMessage() . PHP_EOL
    );
}
