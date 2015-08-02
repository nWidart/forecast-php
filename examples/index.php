<?php

require __DIR__ . '/../vendor/autoload.php';

$forecastPhp = new \Nwidart\ForecastPhp\Forecast('3da43a66de8ca36593e0f44324f49607');

$info = $forecastPhp->get('40.7324296', '-73.9977264');

var_dump($info); exit;
