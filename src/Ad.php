<?php namespace GearBest;

use GearBest\Types\Product;

class Ad {
    public function __construct(string $email, string $password) {
        Request::login($email, $password);
    }

    public function coupons(int $affiliateId, array $params = []) {
        $params['affiliate_id'] = $affiliateId;

        $xpath      = Request::getXpath('/link/coupon-text-link', $params);
        $coupons    = [];

        /** @var \DOMElement $node */
        foreach ($xpath->query('//table[@class="table coupon-table"]//tbody//tr') AS $node) {
            $nodes  = $node->getElementsByTagName('td');
            $data   = $nodes->item(5);

            $coupon = new Product();
            $coupon->setId($data->getAttribute('data-couponid'));
            $coupon->setTitle($data->getAttribute('data-couponname'));
            $coupon->setStartAt($nodes->item(3)->textContent);
            $coupon->setEndAt($nodes->item(4)->textContent);
            $coupon->setImage($data->getAttribute('data-imgurl'));
            $coupon->setLink($nodes->item(0)->getElementsByTagName('a')->item(1)->getAttribute('href'));
            $coupon->setCode($nodes->item(1)->textContent);
            $coupon->setLimited($nodes->item(2)->textContent);
            $coupon->setClickTagUrl('/link/do-add-coupon-link');
            $coupon->setClickTagParams([
                'id'            => $coupon->getId(),
                'aff_id'        => $affiliateId,
                'link_img'      => $coupon->getImage(),
                'material_id'   => $data->getAttribute('data-material-id'),
                'material_type' => 7
            ]);

            $coupons[] = $coupon;
        }

        return $coupons;
    }

    public function newArrivals(int $affiliateId, array $params = []) {
        $params['affiliate_id'] = $affiliateId;

        $xpath      = Request::getXpath('/home/link/new-arrivals', $params);
        $products   = [];

        /** @var \DOMElement $node */
        foreach ($xpath->query('//ul[@class="newarrivals-list clearfix"]//li') AS $node) {
            $data = $node->getElementsByTagName('button')->item(0);

            $product = new Product();
            $product->setId($data->getAttribute('data-material-id'));
            $product->setTitle($data->getAttribute('data-title'));
            $product->setImage($data->getAttribute('data-url'));
            $product->setDiscount($node->getElementsByTagName('strong')->item(0)->textContent);
            $product->setPrice("{$data->getAttribute('data-current_intval_price')}.{$data->getAttribute('data-current_float_price')}");
            $product->setCode($data->getAttribute('data-code'));
            $product->setLink($data->getAttribute('data-link'));
            $product->setClickTagUrl('/link/do-add-banner-link');
            $product->setClickTagParams([
                'link_url'      => $product->getLink(),
                'link_img'      => $product->getImage(),
                'aff_id'        => $affiliateId,
                'cate_id'       => $data->getAttribute('data-cate'),
                'material_id'   => $product->getId(),
                'material_type' => 2
            ]);

            $products[] = $product;
        }

        return $products;
    }
}