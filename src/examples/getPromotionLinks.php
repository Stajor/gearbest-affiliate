<?php require_once './vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__);
$dotenv->load();

$api = new \GearBest\API(getenv('API_KEY'), getenv('API_SECRET'));

$response = $api->getPromotionLinks([
    'associate_id'  => getenv('ASSOCIATE_ID'),
    'urls'          => 'https://www.gearbest.com/sling-bag/pp_490201.html,https://www.gearbest.com/rc-quadcopters/pp_571962.html'
]);

var_dump($response->toArray());