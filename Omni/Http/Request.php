<?php

namespace Omni\Http;

class Request {

    protected $headers = [];

    protected $body = [];

    public function __construct() {
        $this->retrieveHeaders();
        $this->retrieveBody();
    }

    private function retrieveHeaders() {
        $this->headers = getallheaders();
    }

    private function retrieveBody() {
        
        // Check for active body method
        if (isset($this->headers['Content-Type'])) {
        
            switch ($this->headers['Content-Type']) {
                case 'application/json':
                    $this->body = $this->retrieveJSONBody();
                    break;
                case 'application/x-www-form-urlencoded':
                    
                    break;
                case 'multipart/form-data':
                    
                    break;
            }

        } else {
            // If there is not active body method, the body will be left empty.
            $this->body = [];
        }
    }

    private function retrieveJSONBody() {
        return json_decode(file_get_contents('php://input'), true);
    }
}

?>
