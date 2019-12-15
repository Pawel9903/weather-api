<?php declare(strict_types=1);

namespace App\Weather\Dao;

use App\Weather\Curl\WeatherCurl;
use App\Weather\Model\Station\AirQuality\AirQuality;
use App\Weather\Transformer\Station\AirQuality\AirQualityTransformer;

/**
 * Class AirQualityDao
 * @package App\Weather\Dao
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class AirQualityDao
{
    /**
     * @var WeatherCurl
     */
    private WeatherCurl $curl;

    /**
     * @var AirQualityTransformer
     */
    private AirQualityTransformer $AQTransformer;

    /**
     * AirQualityDao constructor.
     * @param AirQualityTransformer $AQTransformer
     * @param WeatherCurl $curl
     */
    public function __construct(AirQualityTransformer $AQTransformer, WeatherCurl $curl)
    {
        $this->curl = $curl;
        $this->AQTransformer = $AQTransformer;
    }

    /**
     * @param int $id
     * @return AirQuality
     * @throws \Exception
     */
    public function getAirQualityByStationId(int $id): AirQuality
    {
        $result = $this->curl->airQualityByStationId($id);
        return $this->AQTransformer->transform($result);
    }
}