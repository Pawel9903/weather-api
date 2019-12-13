<?php declare(strict_types=1);

namespace App\Weather\Dao;

use App\Core\Dao\DaoCollectionInterface;
use App\Core\Dao\DaoCollectionParam\DaoCollectionParamInterface;
use App\Weather\Curl\StationCurl;
use App\Weather\Model\Station\Station;
use App\Weather\Transformer\Station\SensorTransformer;

class SensorDao implements DaoCollectionInterface
{
    /**
     * @var StationCurl
     */
    private StationCurl $curl;

    /**
     * @var SensorTransformer
     */
    private SensorTransformer $transformer;

    /**
     * StationDao constructor.
     * @param SensorTransformer $transformer
     * @param StationCurl $curl
     */
    public function __construct(SensorTransformer $transformer, StationCurl $curl)
    {
        $this->curl = $curl;
        $this->transformer = $transformer;
    }

    /**
     * @param null|DaoCollectionParamInterface $params
     * @return Station[]
     */
    public function getData(?DaoCollectionParamInterface $params = null): array
    {
        if(!empty($params->getRouteParam()['id'])) {
            $data = $this->curl->sensorsByStationId((int) $params->getRouteParam()['id']);
            return array_map([$this->transformer, 'transform'], $data);
        }
        return [];
    }

    /**
     * @param array $collection
     * @param array $filter
     * @return array
     */
    public function setFilters(array $collection, array $filter = []): array
    {
        return $collection;
    }
}