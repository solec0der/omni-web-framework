<?php

namespace Omni;

class Router {

    protected $basePath = '';

    protected $routes = [];

    protected $routeCounter = 0;

    public function __construct($basePath = '') {
        $this->basePath = $basePath;
    }

    public function map($methods, $pattern, $callable) {
        if (!is_string($pattern)) {
            // Currently, there is no real error handling. This has to suffise for now.
            echo "Pattern has to be a string";
        }

        $methods = array_map('strtoupper', $methods);

        $route = $this->createRoute($methods, $pattern, $callable);
        
        $this->routes[$route->getIdentifier()] = $route;
        $this->routeCounter++;

        return $route;
    }

    protected function createRoute($methods, $pattern, $callable): Route {
        $route = new Route($methods, $pattern, $callable, $this->routeCounter);

        // TODO: When implemented, the container has to be set to the route.
        return $route;
    }
}
