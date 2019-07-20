<?php

namespace Omni;

class Route {

    protected $methods;

    protected $pattern;

    protected $callable;

    protected $identifier;

    protected $container;

    public function __construct(array $methods, string $pattern, $callable, $identifier = 0) {
        $this->methods = $methods;
        $this->pattern = $pattern;
        $this->callable = $callable;
        $this->identifier = $identifier;
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

    public function setContainer(Container $container) {
        $this->container = $container;
    }
}
