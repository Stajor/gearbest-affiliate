<?php require_once './vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__);
$dotenv->load();

$affiliate = new \GearBest\Ad(getenv('GB_EMAIL'), getenv('GB_PASSWORD'));
$coupons = $affiliate->highCommissionProducts(getenv('GB_AFFILIATE'), ['pagesize' => 100]);

print_r($coupons);