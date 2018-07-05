<?php require_once './vendor/autoload.php';

\GearBest\Request::login('', '');

$affiliate = new \GearBest\Affiliate();
$coupons = $affiliate->coupons(10087298, ['pagesize' => 100, 'site_id' => 'en']);

print_r($coupons);