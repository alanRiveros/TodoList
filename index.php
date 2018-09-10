<?php
require 'vendor/autoload.php';
use \Todo\Application\Services\QueryListService;
use \Infrastructure\ListRepository;

$app = new Slim\App();
$config = json_decode(file_get_contents('configs/database.json'), true);
$db = new PDO("mysql:host={$config['dbHost']};dbname={$config['dbName']}", $config['user'], $config['password']);
$listRepo = new ListRepository($db);

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

$app->run();