<?php

header('Content-Type: application/json');

require_once "autoload.php";

$app = new \Omni\App();

$app->get('/', function($request, $response) {
    $response->json(200, [
        'contents' => [
            'test',
            'test2'
        ]
    ]);
});

$app->get('/test', function($request, $response) {
    $response->json(200, [
        'contents' => [
            'test',
            'test2'
        ]
    ]);
});

$app->setBasePath('/');

$app->run();
