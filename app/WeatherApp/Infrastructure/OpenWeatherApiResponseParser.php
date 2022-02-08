<?php


namespace WeatherApp\Infrastructure;


use Exception;
use stdClass;
use WeatherApp\Domain\OverallConditions;
use WeatherApp\Domain\Temperature;
use WeatherApp\Domain\WeatherReport;

/**
 * This parser's role is to get turn an the response received from the external API in the form of a stdClass object into a proper WeatherReport
 * Class OpenWeatherApiResponseParser
 * @package WeatherApp\Infrastructure
 */
class OpenWeatherApiResponseParser
{

    /**
     * @param stdClass $response
     * @return WeatherReport
     * @throws Exception
     */
    public function parseApiResponse(stdClass $response): WeatherReport
    {
        if (property_exists($response, "main") && property_exists($response, "weather")) {
            return new WeatherReport(
                new Temperature($response->main->temp),
                new OverallConditions($this->getWeatherDescriptions($response->weather))
            );
        } else {
            throw new Exception("The response from the data provider does not include expected data");
        }

    }

    /**
     * According to the OpenWeather API documentation, there can be multiple conditions provided.
     * This helper method joins them together into one coherent weather description
     * @param $weatherConditions
     * @return string
     */
    private function getWeatherDescriptions(array $weatherConditions)
    {
        $descriptions = [];
        foreach ($weatherConditions as $condition) {
            $descriptions[] = $condition->description;
        }
        return implode(', ', $descriptions);
    }

}