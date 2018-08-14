<?php require_once './vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__);
$dotenv->load();

$api = new \GearBest\API(getenv('API_KEY'), getenv('API_SECRET'));

$response = $api->getCompletedOrders([
    'start_date'    => '2018-06-01',
    'end_date'      => '2018-09-01',
    'status'        => 3,
]);

var_dump($response->toArray());