<?php

namespace Tiran133;


use GuzzleHttp\Client;

class IPInfoDB
{
    /**
     * @var Client
     */
    private $http;

    /**
     * @var
     */
    private $apiKey;

    /**
     * @var string
     */
    private $apiBaseUrl = 'https://api.ipinfodb.com/v3/';
    /**
     * @var string
     */
    private $apiCityBase = 'ip-city/';
    /**
     * @var string
     */
    private $apiCountryBase = 'ip-country/';

    /**
     * IPInfoDB constructor.
     * @param $apiKey
     */
    function __construct($apiKey)
    {
        if (!$apiKey) {
            throw new \InvalidArgumentException('No API Key was provided to IPInfoDB');
        }

        $this->apiKey = $apiKey;
        $this->http = New Client(['base_uri' => $this->apiBaseUrl]);
    }


    /**
     * @param $ip
     * @return bool|mixed
     */
    public function getCountry($ip)
    {
        $response = $this->http->get($this->apiCountryBase, [
            'query' => [
                'key'    => $this->apiKey,
                'ip'     => $ip,
                'format' => 'json',
            ],
        ]);
        $responseBody = $response->getBody();
        if (($json = json_decode($responseBody)) === null) {
            return false;
        }
        return $json;
    }

    /**
     * @param $ip
     * @return bool|mixed
     */
    public function getCity($ip)
    {
        $response = $this->http->get($this->apiCityBase, [
            'query' => [
                'key'    => $this->apiKey,
                'ip'     => $ip,
                'format' => 'json',
            ],
        ]);

        $responseBody = $response->getBody();
        if (($json = json_decode($responseBody)) === null) {
            return false;
        }
        return $json;
    }

}
