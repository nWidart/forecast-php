<?php namespace Nwidart\ForecastPhp;

use GuzzleHttp\Client;

class Forecast
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $endpoint = 'https://api.forecast.io/forecast';

    /**
     * @var Client
     */
    private $client;
    /**
     * @var array
     */
    private $options;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Get the weather for the given latitude and longitude
     * Optionally pass in a time for the query
     * @param null|string $latitude
     * @param null|string $longitude
     * @param null|string $time
     * @return array
     */
    public function get($latitude = null, $longitude = null, $time = null)
    {
        $this->guardAgainstEmptyArgument($latitude, 'latitude');
        $this->guardAgainstEmptyArgument($longitude, 'longitude');

        $url = $this->getUrl($latitude, $longitude, $time);

        $forecast = $this->getClient()->get($url);

        return $forecast->json();
    }

    /**
     * Set options on the request to be made to Forecast
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Set the http client to use
     * @param $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * Get the guzzle client
     * @return Client
     */
    private function getClient()
    {
        if ($this->client) {
            return $this->client;
        }

        return new Client();
    }

    /**
     * Guard against empty arguments
     * @param string $argument
     * @param string $argumentName
     */
    private function guardAgainstEmptyArgument($argument, $argumentName)
    {
        if (empty($argument)) {
            throw new \InvalidArgumentException("$argumentName is required.");
        }
    }

    /**
     * @param string $latitude
     * @param string $longitude
     * @param string $time
     * @return string
     */
    private function getUrl($latitude, $longitude, $time)
    {
        $url = "{$this->endpoint}/{$this->apiKey}/$latitude,$longitude";

        if ($time) {
            $url .= ",$time";
        }

        if ($this->options) {
            $url .= '?' . http_build_query($this->options);
        }

        return $url;
    }
}
