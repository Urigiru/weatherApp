<?php


namespace WeatherApp\Presentation;


use Exception;

/**
 * Class ErrorPresenter
 * This is where Exceptions are formatted into a user-friendly error message
 * @package WeatherApp\Presentation
 */
class ErrorPresenter
{
    private const OUTPUT_STRING = 'There were problems with running the application. ' . PHP_EOL .
    'You might need to look out of the window or even go outside to check the weather.' . PHP_EOL .
    'Sorry for the inconvenience' . PHP_EOL .
    'Reason for the crash: %s' . PHP_EOL;

    public function presentError(Exception $exception)
    {
        return sprintf(self::OUTPUT_STRING, $exception->getMessage());
    }

}