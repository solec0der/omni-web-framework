<?php

namespace Omni;

class Route {

    protected $methods;

    protected $pattern;

    protected $callable;

    protected $identifier;

    protected $container;

    protected $params;

    public function __construct(array $methods, string $pattern, $callable, $identifier = 0, $params = []) {
        $this->methods = $methods;
        $this->pattern = $pattern;
        $this->callable = $callable;
        $this->identifier = $identifier;
        $this->params = $params;
    }
    
    public function getMethods(): array {
        return $this->methods;
    }

    public function getPattern(): string {
        return $this->pattern;
    }

    public function getCallable() {
        return $this->callable;
    }
    
    public function getIdentifier() {
        return $this->identifier;
    }

    public function getContainer() {
        return $this->container;
    }
    
    public function getParams() {
        return $this->params;
    }

    public function setContainer(Container $container) {
        $this->container = $container;
    }
}
