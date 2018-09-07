<?php
require 'vendor/autoload.php';

$app = new Slim\App();

$app->get('/', function ($request, $response, $args) {
    return $response->getBody()->write("Hello /");
});

$app->get('/getAll',  function($request, $response){
    return $response->getBody()->write("GetAll");
});

$app->get('/getOne/{id}',  function($request, $response){
    return $response->getBody()->write("Get" . $args['id']);
});

$app->run();