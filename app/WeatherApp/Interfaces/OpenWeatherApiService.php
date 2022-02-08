<?php


namespace WeatherApp\Interfaces;

use Curl\Curl;
use stdClass;
use WeatherApp\Domain\Town;
use WeatherApp\Exceptions\CouldNotConnectToServiceException;
use WeatherApp\Infrastructure\Config;

/**
 * Class OpenWeatherApiService
 * This is the real workhorse of the application, as well as an important failure point.
 * The success of the application depends on this service being able to properly reach
 * the openweathermap API and fetch data from it.
 * @package WeatherApp\Interfaces
 */
class OpenWeatherApiService
{
    private static string $apiUrl = "https://api.openweathermap.org/data/2.5/weather/";
    /**
     * @var Config
     */
    private Config $config;

    /**
     * OpenWeatherApiService constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param Town $town
     * @return stdClass
     * @throws CouldNotConnectToServiceException
     */
    public function callOpenWeatherEndpoint(Town $town)
    {
        $curl = new Curl();

        $curl->get(OpenWeatherApiService::$apiUrl, [
            'q' => $town->getName(),
            'appid' => $this->config->get('open-weather-map', 'key'),
            'units' => $this->config->get('open-weather-map', 'units')
        ]);

        if ($curl->error) {
            throw new CouldNotConnectToServiceException( $curl->errorMessage, $curl->errorCode);
        }
        return $curl->response;
    }
}