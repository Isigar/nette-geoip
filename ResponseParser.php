<?php
/**
 * Tady v tomto se bude parsovat response do tříd.
 */

namespace Relisoft\Geoip;


use Nette\Utils\Json;

class ResponseParser
{
    /**
     * Raw response from server
     * @var string
     */
    private $raw;
    /**
     * Decoded raw response
     * @var \stdClass
     */
    private $json;

    /**
     * @param \GuzzleHttp\Psr7\Response $response
     * @return Response|bool|\GuzzleHttp\Psr7\Response
     * @throws \Nette\Utils\JsonException
     */
    public function create(\GuzzleHttp\Psr7\Response $response){
        if($response->getStatusCode() == 200){
            $read = $response->getBody()->read($response->getBody()->getSize());
            $this->raw = $read;
            $this->json = Json::decode($read);
            $array = Json::decode($read,Json::FORCE_ARRAY);
            $response = new Response();
            $response->associate($array);
            return $response;
        }else{
            return false;
        }
    }
}