<?php

namespace PHPUBG;

require __DIR__ . '/../../vendor/autoload.php';

use GuzzleHttp\Client;

class PHPUBG {

    public function __construct($apiToken, $pubgNickname)
    {
        $this->apiToken = $apiToken;
        $this->guzzle = new \GuzzleHttp\Client();
        $this->pubgURL = "https://pubgtracker.com/api/profile/pc/$pubgNickname";
    }

    /**
     * Queries the API
     * @param String
     * @return Guzzle Response
     */
    private function get($url)
    {
        return $this->guzzle->request('GET', $url, [
            "headers" => [
                "TRN-Api-Key" => $this->apiToken
            ]
        ]);
    }

    /**
     * Takes a guzzle response, gets the body, and converts it to an array
     * This returns all of the API's results
     * @param Guzzle Response
     * @return Array
     */
    public function getFullBody($guzzleResponse)
    {
        $guzReq = $this->get($this->pubgURL);
        return json_decode($guzReq->getBody(), true);
    }
}
