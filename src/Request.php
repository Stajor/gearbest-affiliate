<?php namespace GearBest;

use GuzzleHttp\Client;

final class Request {
    const URL = 'https://affiliate.gearbest.com';
    private static $client;

    private function __construct(){}

    public static function getInstance(): Client {
        if (!isset(self::$client)) {
            self::$client = new Client([
                'cookies' => true,
                'headers' => [
                    'X-Requested-With' => 'XMLHttpRequest'
                ]
            ]);
        }

        return self::$client;
    }

    public static function login(string $email, string $password) {
        $response = self::post('/user/do-signin', [
            'email' => $email,
            'password' => $password
        ]);

        $data = json_decode($response->getBody(), true);
    }

    public static function post($partUrl, array $params) {
        return self::getInstance()->post(self::URL.$partUrl, ['form_params' => $params]);
    }

    public static function getXpath($partUrl, array $params = []): \DOMXPath {
        $doc = new \DOMDocument();
        libxml_use_internal_errors(true);
        $response = self::getInstance()->get(self::URL.$partUrl, ['query' => $params]);
        $doc->loadHTML($response->getBody());
        return new \DOMXPath($doc);
    }
}

