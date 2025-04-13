<?php

namespace ObserverPattern;

use ObserverPattern\Interface\Observer;
use ObserverPattern\Interface\Observable;

class WeatherData implements Observable {

    private float $temperature;
    private float $humidity;
    private float $pressure;

    /**
     * @var Observer[]
     */
    private array $observers = [];

    public function registerObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function unregisterObserver(Observer $observer) {
        $observerKey = array_find_key($this->observers, fn(&$o) => $o === $observer);
        unset($this->observers[$observerKey]);
    }

    public function notifyObservers() {
        foreach ($this->observers as $o) {
            $o->update($this);
        }
    }

    public function getTemperature() {
        return $this->temperature;
    }

    public function getHumidity() {
        return $this->humidity;
    }

    public function getPressure() {
        return $this->pressure;
    }

    public function measurementsChanged() {
        $this->notifyObservers();
    }

    public function updateData(float $temperature, float $humidity, float $pressure) {
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->measurementsChanged();
    }
}
