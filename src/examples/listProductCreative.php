<?php require_once './vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__);
$dotenv->load();

$api = new \GearBest\API(getenv('API_KEY'), getenv('API_SECRET'));

$response = $api->listProductCreative([
    'type' => 1,
    'page' => 1
]);

var_dump($response->toArray());