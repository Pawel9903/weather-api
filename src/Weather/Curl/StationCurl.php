<?php declare(strict_types=1);

namespace App\Weather\Curl;

use App\Core\Curl\Curl;

/**
 * Class StationCurl
 * @package App\Weather\Curl
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class StationCurl extends Curl
{

    public function __construct()
    {
        parent::__construct();
        $this->setBasicUrl($_ENV['WEATHER_API_HOST'], WeatherPrefixEnum::STATION_PREFIX);
    }

    /**
     * @return array
     */
    public function stations(): array
    {
        return $this->get('findAll');
    }

    /**
     * @param int $id
     * @return array
     */
    public function sensorsByStationId(int $id): array
    {
        return $this->get("sensors/{$id}");
    }
}