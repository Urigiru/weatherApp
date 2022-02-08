<?php


namespace WeatherApp\Domain;

/**
 * Class Town
 * This domain object represents a place that we are trying to get weather for.
 * Right now it's only property is name, but it could be extended with for example coordinates
 * @package WeatherApp\Domain
 */
class Town
{
    private string $name;

    /**
     * Town constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


}