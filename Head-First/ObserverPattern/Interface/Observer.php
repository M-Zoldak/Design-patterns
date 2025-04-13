<?php

namespace ObserverPattern\Interface;

interface Observer {
    public function update(Observable $s);
}
