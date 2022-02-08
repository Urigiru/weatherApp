<?php


namespace phpUnitTests\Infrastructure;

use PHPUnit\Framework\TestCase;
use WeatherApp\Domain\OverallConditions;
use WeatherApp\Domain\Temperature;
use WeatherApp\Domain\WeatherReport;
use WeatherApp\Infrastructure\OpenWeatherApiResponseParser;

final class OpenWeatherApiResponseParserTest extends TestCase
{
    public function testsParsesApiReplyCorrectly(): void
    {
        $parser = new OpenWeatherApiResponseParser();

        $mockResponseObject = (object)[
            'id' => '3082998',
            'main' => (object)['temp' => 20.12, 'feels_like' => 19],
            'weather' => [
                (object)['main' => 'Clouds', 'description' => 'light clouds', 'icon' => "o4n"]
            ]

        ];
        $output = $parser->parseApiResponse($mockResponseObject);

        $expected = new WeatherReport(
            new Temperature(20.12),
            new OverallConditions('light clouds')
        );

        $this->assertSame($output->getTemperature()->getValueInCelsius(),
            $expected->getTemperature()->getValueInCelsius());
        $this->assertSame($output->getOverallConditions()->getDescription(),
            $expected->getOverallConditions()->getDescription());
    }
}