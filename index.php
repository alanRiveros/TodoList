<?php
require 'vendor/autoload.php';
use \Todo\Application\Services\QueryListService;

$app = new Slim\App();

$app->get('/', function ($request, $response) {
    return $response->withJson(['status' => 'online']);
});

$app->get('/listAll',  function($request, $response){
    $queryService = new QueryListService();    
    return $response->withJson($queryService->listAll());
});

$app->get('/getOne/{id}',  function($request, $response, $args){
    return $response->getBody()->write("Get" . $args['id']);
});

$app->run();