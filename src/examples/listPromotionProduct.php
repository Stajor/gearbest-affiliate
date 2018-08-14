<?php require_once './vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__);
$dotenv->load();

$api = new \GearBest\API(getenv('API_KEY'), getenv('API_SECRET'));

$response = $api->listPromotionProduct([
    'currency'  => 'USD',
    'page'      => '1',
    'language'  => 'en',
    'category'  => 11239,
]);

var_dump($response->toArray());