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
    /**
     * Format for the error
     */
    private const DEFAULT_OUTPUT_STRING = 'There were problems with running the application. ' . PHP_EOL .
    'You might need to look out of the window or even go outside to check the weather.' . PHP_EOL .
    'Sorry for the inconvenience' . PHP_EOL .
    'Reason for the crash: %s' . PHP_EOL;

    private const CITY_NOT_FOUND_OUTPUT_STRING = 'The city name has not be recognized. Please try again.' . PHP_EOL;


    /**
     * @param Exception $exception
     * @return string
     */
    public function presentError(Exception $exception)
    {
        if ($exception->getMessage() === "HTTP/1.1 404 Not Found") {
            return sprintf(self::CITY_NOT_FOUND_OUTPUT_STRING, $exception->getMessage());
        }
        return sprintf(self::DEFAULT_OUTPUT_STRING, $exception->getMessage());
    }

}