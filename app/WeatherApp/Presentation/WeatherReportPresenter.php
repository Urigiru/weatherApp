<?php


namespace WeatherApp\Presentation;


use WeatherApp\Domain\WeatherReport;

/**
 * Class WeatherReportPresenter
 * This is the tool that turns the WeatherReport into a simple text message
 * @package WeatherApp\Presentation
 */
class WeatherReportPresenter
{
    /**
     * Format for the output
     */
    private const OUTPUT_STRING = "%s, %s degrees Celcius" . PHP_EOL;

    /**
     * @param WeatherReport $weatherReport
     * @return string
     */
    public function presentWeatherReport(WeatherReport $weatherReport)
    {
        return sprintf(
            self::OUTPUT_STRING,
            ucfirst($weatherReport->getOverallConditions()->getDescription()),
            $weatherReport->getTemperature()->getValueInCelsius()
        );
    }
}