<?php

namespace ObserverPattern\Display;

use ObserverPattern\Interface\DisplayElement;
use ObserverPattern\Interface\Observer;
use ObserverPattern\Interface\Observable;
use ObserverPattern\WeatherData;

class CurrentConditionsDisplay implements DisplayElement, Observer {
    private float $temperature;
    private float $pressure;
    private float $humidity;

    // In case we want to unsubscribe someday
    private WeatherData $subject;

    public function __construct(Observable $subject) {
        $this->subject = $subject;
        $subject->registerObserver($this);
    }


    public function display() {
        echo "Current temperature: " . $this->temperature . "\n";
        echo "Current pressure: " . $this->pressure . "\n";
        echo "Current humidity: " . $this->humidity . "\n";
    }

    public function update(Observable $subject) {
        if ($subject instanceof WeatherData) {
            $this->temperature = $subject->getTemperature();
            $this->humidity = $subject->getHumidity();
            $this->pressure = $subject->getPressure();
        }

        $this->display();
    }
}
