<?php

namespace Omni;

class Route {

    private $methods;

    private $pattern;

    private $callable;

    public function __construct(array $methods, string $pattern, $callable) {
        $this->methods = $methods;
        $this->pattern = $pattern;
        $this->callable = $callable;
    }

    /**
     * @return array
     */
    public function getMethods(): array {
        return $this->methods;
    }

    /**
     * @return string
     */
    public function getPattern(): string {
        return $this->pattern;
    }

    /**
     * @return mixed
     */
    public function getCallable() {
        return $this->callable;
    }
}