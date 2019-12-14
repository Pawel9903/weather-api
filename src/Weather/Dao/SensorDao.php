<?php declare(strict_types=1);

namespace App\Weather\Dao;

use App\Core\Dao\DaoCollectionInterface;
use App\Core\Dao\DaoCollectionParam\DaoCollectionParamInterface;
use App\Core\Dao\DaoCollectionParam\ParamElement;
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
        $id = $params->getRouteParams()->getParameter('id');
        if($id !== null) {
            $data = $this->curl->sensorsByStationId((int) $id);
            return array_map([$this->transformer, 'transform'], $data);
        }
        return [];
    }

    /**
     * @param array $collection
     * @param ParamElement $filter
     * @return array
     */
    public function setFilters(array $collection, ParamElement $filter): array
    {
        return $collection;
    }
}