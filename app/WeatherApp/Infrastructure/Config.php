<?php


namespace WeatherApp\Infrastructure;

/**
 * Class Config
 * This is the representation of configuration stored in a separate, unversioned file.
 * @package WeatherApp\Infrastructure
 */
class Config
{
    private static string $fileName = 'env.ini';
    private string $configPath;
    private array $values;

    /**
     * Config constructor
     * The constructor will scan the configuration file for key value pairs and set them to be accessible for the application
     * It will also substitute the api key provided in the file with the environmental variable value, if it is set
     * @throws \Exception
     */
    public function __construct()
    {
        $this->configPath = sprintf('%s/../../../bootstrap/%s', __DIR__, Config::$fileName);
        if (is_file($this->configPath) === false) {
            throw new \Exception(sprintf('There is no config file matching: %s', $this->configPath));
        }

        $values = parse_ini_file($this->configPath, true);
        if (false === $values) {
            throw new \Exception(sprintf('Reading config file failed (%s)', $this->configPath));
        }
        /**
         * If there is an environment variable provided, use that as API KEY instead
         */
        if (getenv('API_KEY')) {
            $values['open-weather-map']['key'] = getenv('API_KEY');
        } else {
            die ('no api key');
        }


        $this->values = $values;
    }

    /**
     * This is the method that provides requested configuration parameters that were loaded from the config file
     * @param $section
     * @param $key
     * @return mixed
     */
    public function get($section, $key)
    {
        return $this->values[$section][$key];
    }
}