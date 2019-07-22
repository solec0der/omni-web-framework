<?php

namespace Omni;

class Router {

    protected $container;

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

        if ($this->getRouteByPattern($pattern) !== null) {
            echo "route already exists"; 
            die();
        } else {
            $methods = array_map('strtoupper', $methods);

            $route = $this->createRoute($methods, $pattern, $callable);

            $this->routes[$route->getIdentifier()] = $route;
            $this->routeCounter++;

            return $route;
        }
    }

    protected function createRoute($methods, $pattern, $callable): Route {
        $route = new Route($methods, $pattern, $callable, $this->routeCounter);

        $route->setContainer($this->container);

        return $route;
    }

    public function getContainer() {
        return $this->container;
    }

    public function setContainer(Container $container) {
        $this->container = $container;
    }

    public function setBasePath(string $basePath) {
        $this->basePath = $basePath;
    }
    
    public function getBasePath(): string {
        return $this->basePath;
    }

    public function getRouteByPattern(string $pattern) {
        
        if (!is_string($pattern)) {
            echo "Pattern has to be a string";
        }

        // Start search of Route
        foreach ($this->routes as $route) {

            if ($route->getPattern() === $pattern) {
                return $route;
            }

        }

        return null;
    }

    public function getUrlParameters($routeIdentifier) {
        
    }
}
