<?php


namespace WeatherApp\Domain;

/**
 * Class Temperature
 * This anemic domain object holds the data about current temperature.
 * For now it is always in Celsius, but it could feasibly be equipped with conversion methods
 * @package WeatherApp\Domain
 */
class Temperature
{
    private float $valueInCelsius;

    /**
     * Temperature constructor.
     * @param float $valueInCelsius
     */
    public function __construct(float $valueInCelsius)
    {
        $this->valueInCelsius = $valueInCelsius;
    }

    /**
     * @return float
     */
    public function getValueInCelsius(): float
    {
        return $this->valueInCelsius;
    }

}