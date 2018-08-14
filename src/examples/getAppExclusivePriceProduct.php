<?php require_once './vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__);
$dotenv->load();

$api = new \GearBest\API(getenv('API_KEY'), getenv('API_SECRET'));

$response = $api->getAppExclusivePriceProduct([
    'currency' => 'USD'
]);

var_dump($response->toArray());