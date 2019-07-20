<?php

namespace Omni;

class App {

    const VERSION = '1.0-SNAPSHOT';

    private $container;

    public function __construct() {
    }

    public function get($pattern, $callable) {
        return $this->map(['GET'], $pattern, $callable);
    }

    public function post($pattern, $callable) {
        return $this->map(['POST'], $pattern, $callable);
    }

    public function put($pattern, $callable) {
        return $this->map(['PUT'], $pattern, $callable);
    }
    
    public function patch($pattern, $callable) {
        return $this->map(['PATCH'], $pattern, $callable);
    }

    public function delete($pattern, $callable) {
        return $this->map(['DELETE'], $pattern, $callable);
    }
    
    public function options($pattern, $callable) {
        return $this->map(['OPTIONS'], $pattern, $callable);
    }
    
    public function any($pattern, $callable) {
        return $this->map(['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'], $pattern, $callable);
    }

    public function map(array $methods, $pattern, $callable) {
                
    }
}
