<?php

namespace Omni;

class Container {

    private $entities = [
        'router' => null,
        'response' => null,
        'request' => null
    ];

    public function __construct() {
        $this->initialiseEntities();
    }

    protected function initialiseEntities() {
        $this->entities['router'] = new Router();
        $this->entities['router']->setContainer($this);

        $this->entities['response'] = new Http\Response();
        $this->entities['request'] = new Http\Request();
    }

    public function get($identifier) {
        if (isset($this->entities[$identifier])) {
            return $this->entities[$identifier];
        }

        // maybe throw exception
        return null;
    }

    public function has($identifier) {
        return isset($this->entities[$identifier]);
    }
}

?>
