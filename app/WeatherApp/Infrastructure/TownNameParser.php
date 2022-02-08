<?php


namespace WeatherApp\Infrastructure;

/**
 * Class TownNameParser
 * This parser takes the (commandline) arguments' array and turns them into a single place name
 * @package WeatherApp\Infrastructure
 */
class TownNameParser
{
    /**
     * Some city have names consisting of multiple words, which is why we'll combine all provided words into a single name
     * @param string[] $argumentArray
     * @return string
     */
    public function convertArgumentArrayToTownName(array $argumentArray)
    {
        $townName = '';
        //this gets rid of the file name, the 0th element of the array
        array_shift($argumentArray);
        foreach ($argumentArray as $word) {
            $townName .= $this->sanitizeWord($word) . ' ';
        }
        return trim($townName);
    }

    /**
     * @param string $word
     * @return string
     */
    private function sanitizeWord(string $word)
    {
        return filter_var($word, FILTER_SANITIZE_STRING);
    }
}