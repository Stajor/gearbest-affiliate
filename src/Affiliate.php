<?php namespace GearBest;

use GearBest\Types\Coupon;

class Affiliate {
    public function coupons(int $affiliateId, array $params = []) {
        $params['affiliate_id'] = $affiliateId;

        $xpath      = Request::getXpath('/link/coupon-text-link', $params);
        $coupons    = [];

        /** @var \DOMElement $node */
        foreach ($xpath->query('//table[@class="table coupon-table"]//tbody//tr') AS $node) {
            $nodes  = $node->getElementsByTagName('td');
            $link   = $nodes->item(0)->getElementsByTagName('a')->item(1);

            $coupon = new Coupon();
            $coupon->setAffiliateId($affiliateId);
            $coupon->setId($nodes->item(5)->getAttribute('data-material-id'));
            $coupon->setImage($nodes->item(5)->getAttribute('data-imgurl'));
            $coupon->setTitle($nodes->item(0)->getElementsByTagName('span')->item(0)->textContent);
            $coupon->setLink($link->getAttribute('href'));
            $coupon->setDescription($link->textContent);
            $coupon->setCode($nodes->item(1)->textContent);
            $coupon->setLimit($nodes->item(2)->textContent);
            $coupon->setStartAt($nodes->item(3)->textContent);
            $coupon->setEndAt($nodes->item(4)->textContent);

            $coupons[] = $coupon;
        }

        return $coupons;
    }

    public function newArrivals(int $affiliateId, array $params = []) {
        $params['affiliate_id'] = $affiliateId;

        $xpath      = Request::getXpath('/home/link/new-arrivals', $params);
        $coupons    = [];

        /** @var \DOMElement $node */
        foreach ($xpath->query('//ul[@class="newarrivals-list clearfix"]//li') AS $node) {
            die(var_dump($node));

            $nodes  = $node->getElementsByTagName('td');
            $link   = $nodes->item(0)->getElementsByTagName('a')->item(1);

            $coupon = new Coupon();
            $coupon->setAffiliateId($affiliateId);
            $coupon->setId($nodes->item(5)->getAttribute('data-material-id'));
            $coupon->setImage($nodes->item(5)->getAttribute('data-imgurl'));
            $coupon->setTitle($nodes->item(0)->getElementsByTagName('span')->item(0)->textContent);
            $coupon->setLink($link->getAttribute('href'));
            $coupon->setDescription($link->textContent);
            $coupon->setCode($nodes->item(1)->textContent);
            $coupon->setLimit($nodes->item(2)->textContent);
            $coupon->setStartAt($nodes->item(3)->textContent);
            $coupon->setEndAt($nodes->item(4)->textContent);

            $coupons[] = $coupon;
        }

        return $coupons;
    }
}