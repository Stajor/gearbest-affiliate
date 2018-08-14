<?php namespace GearBest;

use GuzzleHttp\Client;

class API {
    const API_URL = 'https://affiliate.gearbest.com/api/';

    protected $http;
    protected $key;
    protected $secret;

    public function __construct(string $key, string $secret) {
        $this->key      = $key;
        $this->secret   = $secret;
        $this->http     = new Client([
            'base_uri' => self::API_URL
        ]);
    }

    public function getCompletedOrders($params): Collection {
        return $this->request('orders/completed-orders', $params);
    }

    public function listPromotionProduct($params): Collection {
        return $this->request('products/list-promotion-products', $params);
    }

    public function listEventCreative($params): Collection {
        return $this->request('banner/list-event-creative', $params);
    }

    public function listProductCreative($params): Collection {
        return $this->request('promotions/list-product-creative', $params);
    }

    public function listCoupons($params): Collection {
        return $this->request('coupon/list-coupons', $params);
    }

    public function getPromotionLinks($params) {
        return $this->request('promotions/get-promotion-links', $params);
    }

    public function getAppExclusivePriceProduct($params) {
        return $this->request('products/get-app-exclusive-price-product', $params);
    }

    private function request(string $method, array $params) {
        $params['api_key']  = $this->key;
        $params['time']     = time();
        $params['sign']     = $this->sign($params);
        $response           = json_decode($this->http->get($method, ['query' => $params])->getBody(), true);

        if (isset($response['error_no']) && $response['error_no'] > 0) {
            throw new Exception($response['msg'], $response['error_no']);
        }

        return new Collection($response);
    }

    private function sign($params) {
        ksort($params);

        $str = '';

        foreach ($params AS $k => $v) {
            $str .= $k.$v;
        }

        return strtoupper(md5($this->secret.$str.$this->secret));;
    }
}