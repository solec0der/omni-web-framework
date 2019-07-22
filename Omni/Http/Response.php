<?php

namespace Omni\Http;

class Response {
    public function __construct() {

    }

    public function json($status = 200, $body) {
        http_response_code($status);

        echo json_encode($body);
        die();
    }
}

?>
