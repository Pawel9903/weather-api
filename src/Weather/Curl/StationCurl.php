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

    /**
     * StationCurl constructor.
     * @param CurlService $curl
     */
    public function __construct(CurlService $curl)
    {
        parent::__construct($curl);
        $this->setBasicUrl('http://api.gios.gov.pl/pjp-api/rest', WeatherPrefixEnum::STATION_PREFIX);
    }

    /**
     * @return string
     */
    public function stations()
    {
        return $this->get('findAll');
    }
}