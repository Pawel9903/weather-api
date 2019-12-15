<?php declare(strict_types=1);

namespace App\Weather\Handler;

use App\Core\Handler\Handler;
use App\Weather\Dao\AirQualityDao;
use App\Weather\Model\Station\AirQuality\AirQuality;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AirQualityHandler
 * @package App\Weather\Handler
 * @author Pawel Ged <pawelged9903@gmail.com>
 * @method $this handle(Request $request)
 */
class AirQualityHandler extends Handler
{
    /**
     * @var AirQualityDao
     */
    private AirQualityDao $dao;

    /**
     * AirQualityHandler constructor.
     * @param AirQualityDao $dao
     */
    public function __construct(AirQualityDao $dao)
    {
        parent::__construct();
        $this->dao = $dao;
    }

    /**
     * @param int $stationId
     * @return AirQuality
     * @throws \Exception
     */
    public function getAirQuality(int $stationId): AirQuality
    {
        return $this->dao->getAirQualityByStationId($stationId);
    }

    /**
     * @param Request|null $request
     * @return $this
     */
    protected function processing(Request $request = null): self
    {
        return $this;
    }
}