<?php
/**
 * Created by PhpStorm.
 * User: relisoft
 * Date: 1/18/18
 * Time: 9:11 AM
 */

namespace Relisoft\Geoip;


use App\System\Core\Helper\Obass;

class Response extends Obass
{
    private $ip;
    private $country_code;
    private $country_name;
    private $region_code;
    private $region_name;
    private $city;
    private $zip_code;
    private $time_zone;
    private $latitude;
    private $longitude;
    private $metro_code;

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     * @return Response
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * @param mixed $country_code
     * @return Response
     */
    public function setCountryCode($country_code)
    {
        $this->country_code = $country_code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountryName()
    {
        return $this->country_name;
    }

    /**
     * @param mixed $country_name
     * @return Response
     */
    public function setCountryName($country_name)
    {
        $this->country_name = $country_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegionCode()
    {
        return $this->region_code;
    }

    /**
     * @param mixed $region_code
     * @return Response
     */
    public function setRegionCode($region_code)
    {
        $this->region_code = $region_code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegionName()
    {
        return $this->region_name;
    }

    /**
     * @param mixed $region_name
     * @return Response
     */
    public function setRegionName($region_name)
    {
        $this->region_name = $region_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return Response
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zip_code;
    }

    /**
     * @param mixed $zip_code
     * @return Response
     */
    public function setZipCode($zip_code)
    {
        $this->zip_code = $zip_code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTimeZone()
    {
        return $this->time_zone;
    }

    /**
     * @param mixed $time_zone
     * @return Response
     */
    public function setTimeZone($time_zone)
    {
        $this->time_zone = $time_zone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     * @return Response
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     * @return Response
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMetroCode()
    {
        return $this->metro_code;
    }

    /**
     * @param mixed $metro_code
     * @return Response
     */
    public function setMetroCode($metro_code)
    {
        $this->metro_code = $metro_code;
        return $this;
    }


}