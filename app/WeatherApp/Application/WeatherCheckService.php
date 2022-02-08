<?php


namespace WeatherApp\Application;

use Exception;
use WeatherApp\Domain\Town;
use WeatherApp\Domain\WeatherReport;
use WeatherApp\Exceptions\CouldNotConnectToServiceException;
use WeatherApp\Infrastructure\OpenWeatherApiResponseParser;
use WeatherApp\Interfaces\OpenWeatherApiService;

/**
 * Class WeatherCheckService
 * The application service that will call an interface to fetch weather data and then call a parser to format it
 * @package WeatherApp\Application
 */
class WeatherCheckService
{
    /**
     * @var OpenWeatherApiService
     */
    private OpenWeatherApiService $apiService;
    /**
     * @var OpenWeatherApiResponseParser
     */
    private OpenWeatherApiResponseParser $responseParser;


    /**
     * WeatherCheckService constructor.
     * @param OpenWeatherApiService $apiService
     * @param OpenWeatherApiResponseParser $responseParser
     */
    public function __construct(OpenWeatherApiService $apiService, OpenWeatherApiResponseParser $responseParser)
    {
        $this->apiService = $apiService;
        $this->responseParser = $responseParser;
    }

    /**
     * This method does the work here, delegating tasks to the outermost layer of the application.
     * @param Town $town
     * @return WeatherReport
     * @throws CouldNotConnectToServiceException
     * @throws Exception
     */
    public function getCurrentWeather($town)
    {
        $response = $this->apiService->callOpenWeatherEndpoint($town);
        return $this->responseParser->parseApiResponse($response);
    }

}