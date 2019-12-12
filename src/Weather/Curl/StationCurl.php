<?php declare(strict_types=1);

namespace App\Weather\Curl;

use App\Core\Curl\Curl;
use Curl\Curl as CurlService;

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
}