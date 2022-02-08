<?php


namespace WeatherApp\Domain;

/**
 * Class WeatherReport
 * This domain object represents the full weather report this application prepares
 * @package WeatherApp\Domain
 */
class WeatherReport
{
    /**
     * @var Temperature
     */
    private Temperature $temperature;
    /**
     * @var OverallConditions
     */
    private OverallConditions $overallConditions;

    /**
     * WeatherReport constructor.
     * @param Temperature $temperature
     * @param OverallConditions $overallConditions
     */
    public function __construct(Temperature $temperature, OverallConditions $overallConditions)
    {
        $this->temperature = $temperature;
        $this->overallConditions = $overallConditions;
    }

    /**
     * @return Temperature
     */
    public function getTemperature(): Temperature
    {
        return $this->temperature;
    }

    /**
     * @return OverallConditions
     */
    public function getOverallConditions(): OverallConditions
    {
        return $this->overallConditions;
    }


}