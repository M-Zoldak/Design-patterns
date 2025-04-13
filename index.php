<?php

use ObserverPattern\Displays\CurrentConditionsDisplay;
use ObserverPattern\WeatherData;

include_once "vendor/autoload.php";

$weatherData = new WeatherData();

$display = new CurrentConditionsDisplay($weatherData);

$weatherData->updateData(30, 65, 30.4);
$weatherData->updateData(28, 70, 29.2);
