<?php

namespace WeatherApp\Infrastructure\Controllers;

use Exception;
use WeatherApp\Application\WeatherCheckService;
use WeatherApp\Domain\Town;
use WeatherApp\Infrastructure\TownNameParser;
use WeatherApp\Presentation\ErrorPresenter;
use WeatherApp\Presentation\WeatherReportPresenter;

/**
 * Class WeatherAppController
 * The controllers responsibility is to get user input, get the application service to work with it and finally output the desired data.
 * Or in the less happy path, the encountered errors.
 * @package WeatherApp\Infrastructure\Controllers
 */
class WeatherAppController
{

    /**
     * @var WeatherCheckService
     */
    private WeatherCheckService $weatherCheckService;
    /**
     * @var WeatherReportPresenter
     */
    private WeatherReportPresenter $reportPresenter;
    /**
     * @var ErrorPresenter
     */
    private ErrorPresenter $errorPresenter;
    /**
     * @var TownNameParser
     */
    private TownNameParser $townNameParser;


    /**
     * WeatherAppController constructor.
     * @param WeatherCheckService $weatherCheckService
     * @param WeatherReportPresenter $reportPresenter
     * @param ErrorPresenter $errorPresenter
     * @param TownNameParser $townNameParser
     */
    public function __construct(
        WeatherCheckService $weatherCheckService,
        WeatherReportPresenter $reportPresenter,
        ErrorPresenter $errorPresenter,
        TownNameParser $townNameParser
    ) {
        $this->weatherCheckService = $weatherCheckService;
        $this->reportPresenter = $reportPresenter;
        $this->errorPresenter = $errorPresenter;
        $this->townNameParser = $townNameParser;
    }

    /**
     * @param string[] $argumentArray
     */
    public function getCurrentWeather(array $argumentArray)
    {
        try {
            $townName = $this->townNameParser->convertArgumentArrayToTownName($argumentArray);
            $town = new Town($townName);
            $weather = $this->weatherCheckService->getCurrentWeather($town);
        } catch (Exception $exception) {
            echo $this->errorPresenter->presentError($exception);
            exit;
        }

        echo $this->reportPresenter->presentWeatherReport($weather, $town);

    }
}