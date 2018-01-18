<?php
/**
 * Created by PhpStorm.
 * User: relisoft
 * Date: 1/18/18
 * Time: 9:15 AM
 */

namespace Relisoft\Geoip;


use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;

class Request
{
    const HOST = "https://freegeoip.net";
    const RETURN_TYPE = "json";

    /**
     * IP/Website URL
     * @var string
     */
    private $key;
    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param string $key
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function makeRequest($key = ""){
        if(!$this->client){
            $this->client = new Client();
        }

        if($key !== ""){
            $url = self::HOST."/".self::RETURN_TYPE."/".$key;
        }else{
            $url = self::HOST."/".self::RETURN_TYPE."/";
        }
        return $this->client->request("GET",$url);
    }
}