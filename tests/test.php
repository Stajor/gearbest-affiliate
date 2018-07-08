<?php require_once './vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__);
$dotenv->load();

\GearBest\Request::login(getenv('GB_EMAIL'), getenv('GB_PASSWORD'));

$affiliate = new \GearBest\Affiliate();
$coupons = $affiliate->newArrivals(10087298, ['pagesize' => 100]);

print_r($coupons);