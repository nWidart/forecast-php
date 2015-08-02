<?php namespace Nwidart\ForecastPhp\tests;

use GuzzleHttp\Client;
use GuzzleHttp\Message\MessageFactory;
use GuzzleHttp\Subscriber\Mock;

class ForecastTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Nwidart\ForecastPhp\Forecast
     */
    private $forecast;

    public function setUp()
    {
        $forecast = new \Nwidart\ForecastPhp\Forecast('123');

        $body = file_get_contents(__DIR__ . '/fixtures/new-york.json');

        $client = new Client();
        $factory = new MessageFactory();
        $response = $factory->createResponse(200, ['Content-Type' => 'application/javascript'], $body);

        $mock = new Mock([$response]);
        $client->getEmitter()->attach($mock);

        $forecast->setClient($client);

        $this->forecast = $forecast;
    }

    /** @test */
    public function it_returns_correct_response()
    {
        $response = $this->forecast->get('40.7324296', '-73.9977264');

        $this->assertArrayHasKey('latitude', $response);
        $this->assertArrayHasKey('longitude', $response);
    }

    /** @test */
    public function it_should_throw_exception_if_no_latitude_given()
    {
        $this->setExpectedException('InvalidArgumentException', 'latitude is required.');

        $this->forecast->get(null, '-73.9977264');
    }

    /** @test */
    public function it_should_throw_exception_if_no_longitude_given()
    {
        $this->setExpectedException('InvalidArgumentException', 'longitude is required.');

        $this->forecast->get('40.7324296', null);
    }
}
