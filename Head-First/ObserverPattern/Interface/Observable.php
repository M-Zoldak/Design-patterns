<?php

namespace ObserverPattern\Interface;

interface Observable {
    public function registerObserver(Observer $o);
    public function unregisterObserver(Observer $o);
    public function notifyObservers();
}
