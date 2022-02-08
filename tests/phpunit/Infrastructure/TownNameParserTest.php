<?php

namespace phpUnitTests\Infrastructure;

use PHPUnit\Framework\TestCase;
use WeatherApp\Infrastructure\TownNameParser;

final class TownNameParserTest extends TestCase
{

    /**
     * @dataProvider argumentsProvider
     * @param array $arguments
     * @param string $expected
     */
    public function testsParsesTownNamesCorrectly(array $arguments, string $expected): void
    {
        $parser = new  TownNameParser();
        $this->assertSame($expected, $parser->convertArgumentArrayToTownName($arguments));

    }

    public function argumentsProvider(): array
    {
        return [
            [
                ['weather.php', 'New', 'York'],
                'New York',
            ],
            [
                [
                    'weather.php',
                    'Taumatawhakatangihangakoauauotamateaturipukakapikimaungahoronukupokaiwhenuakitanatahu'
                ],
                'Taumatawhakatangihangakoauauotamateaturipukakapikimaungahoronukupokaiwhenuakitanatahu',
            ],
            [
                ['weather.php', 'Khlong', 'Nakhon', 'Nueang', 'Khet'],
                'Khlong Nakhon Nueang Khet',
            ]
        ];
    }
}