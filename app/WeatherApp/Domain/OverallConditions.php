<?php


namespace WeatherApp\Domain;

/**
 * Class OverallConditions
 * This, as it stands, is an anemic domain object representing the summary of the current weather conditions
 * @package WeatherApp\Domain
 */
class OverallConditions
{
    /**
     * @var string
     * It holds the weather description
     */
    private string $description;

    /**
     * OverallConditions constructor.
     * @param string $description
     */
    public function __construct(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }


}