<?php
/**
 * Created by PhpStorm.
 * User: relisoft
 * Date: 1/18/18
 * Time: 9:30 AM
 */

namespace Relisoft\Geoip;


use Nette\Caching\Cache;
use Nette\Caching\IStorage;
use Nette\Object;
use Tracy\Dumper;

/**
 * Class Geoip
 * @method onRequest($key)
 * @method onFinished($result,array $info)
 * @package Relisoft\Geoip
 */
class Geoip extends Object
{
    /**
     * @var Response
     */
    private $response;
    /**
     * @var Request
     */
    private $request;
    /**
     * @var ResponseParser
     */
    private $parser;

    /**
     * Config value
     * @var bool
     */
    private $cache;

    public $onRequest = [];
    public $onFinished = [];

    public function __construct()
    {
        $this->request = new Request();
        $this->parser = new ResponseParser();
    }

    /**
     * @param $key
     * @return Response|bool|\GuzzleHttp\Psr7\Response
     * @throws \Nette\Utils\JsonException
     */
    public function request($key){
        $this->onRequest($key);

        $t1 = microtime();
        /**
         * @var \GuzzleHttp\Psr7\Response $data
         */
        $data = $this->request->makeRequest($key);
        $response = $this->parser->create($data);
        $t2 = microtime();
        $this->onFinished($response,($t2-$t1));
        return $response;
    }

    /**
     * @return bool
     */
    public function isCache(): bool
    {
        return $this->cache;
    }

    /**
     * @param bool $cache
     * @return Geoip
     */
    public function setCache(bool $cache): Geoip
    {
        $this->cache = $cache;
        return $this;
    }


}