<?php


namespace phpUnitTests\Interfaces;

use PHPUnit\Framework\TestCase;
use WeatherApp\Domain\Town;
use WeatherApp\Exceptions\CouldNotConnectToServiceException;
use WeatherApp\Infrastructure\Config;
use WeatherApp\Interfaces\OpenWeatherApiService;

final class OpenWeatherApiServiceTest extends TestCase
{

    public function testsThrowsCorrectExceptionOnWrongApiKey(): void
    {
        $this->expectException(CouldNotConnectToServiceException::class);

        $configMap = [
            ['key', 'badOrExpiredKey'],
            ['units', 'metric']
        ];

        $stub = $this->createMock(Config::class);
        $stub->method('get')
            ->will($this->returnValueMap($configMap));

        $service = new OpenWeatherApiService($stub);
        $service->callOpenWeatherEndpoint(new Town('London'));
    }
}