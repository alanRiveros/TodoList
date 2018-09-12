<?php
require 'vendor/autoload.php';
use \Todo\Application\Services\QueryListService;
use \Infrastructure\ListRepository;
use \Infrastructure\WriteRepository;
use \Todo\Application\CommandHandlers\TaskHandler;
use Broadway\CommandHandling\SimpleCommandBus;

$app = new Slim\App();
$config = json_decode(file_get_contents('configs/database.json'), true);
$db = new PDO("mysql:host={$config['dbHost']};dbname={$config['dbName']}", $config['user'], $config['password']);
$listRepo = new ListRepository($db);
$writeRepo = new WriteRepository($db);

// register the commandHandler
$commandHandler = new TaskHandler($writeRepo);

// register commandBus
$commandBus = new SimpleCommandBus();

// suscribe the handler to bus
$commandBus->suscribe($commandHandler);

$app->get('/', function ($request, $response) {
    return $response->withJson(['status' => 'online']);
});

$app->get('/listAll',  function($request, $response) use ($listRepo){
    $queryService = new QueryListService($listRepo);
    return $response->withJson($queryService->listAll());
});

$app->get('/listOne/{id}',  function($request, $response, $args){
    $queryService = new QueryListService();
    return $response->withJson($queryService->listOne($args['id']));
});

$app->post('/create',  function($request, $response, $args){
    $queryService = new WriteListService();
    return $response->withJson($queryService->createTask());
});

$app->run();