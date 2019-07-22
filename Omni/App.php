<?php

namespace Omni;

class App {

    const VERSION = '1.0-SNAPSHOT';

    private $container;

    public function __construct() {

        // Initialise Container Object
        $this->container = new Container();
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
        return $this->container->get('router')->map($methods, $pattern, $callable);

        // TODO: This method underneath will come in handy whilst I'm creating the closures for the routes.
        // call_user_func_array($callable, ['test braten text', 'test braten text 2']);        

    }

    public function setBasePath(string $basePath = '/') {
        $this->container->get('router')->setBasePath($basePath);
    }

    public function run() {
        // Get the request URL
        $pattern = $this->getRequestURLPattern();

        $route = $this->container->get('router')->getRouteByPattern($pattern);
        $this->executeRoute($route);
    }

    private function getRequestURLPattern() {
        return $_SERVER['REQUEST_URI'];
    }

    private function executeRoute(Route $route) {

        call_user_func_array(
            $route->getCallable(),
            [
                $this->container->get('request'),
                $this->container->get('response')
            ]);

    }
}
