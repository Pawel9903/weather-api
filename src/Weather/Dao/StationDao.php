<?php declare(strict_types=1);

namespace App\Weather\Dao;

use App\Core\Dao\DaoCollectionInterface;
use App\Core\Dao\DaoCollectionParam\DaoCollectionParamInterface;
use App\Core\Dao\DaoCollectionParam\ParamElement;
use App\Weather\Curl\WeatherCurl;
use App\Weather\Model\Station\Station;
use App\Weather\Transformer\Station\StationTransformer;

class StationDao implements DaoCollectionInterface
{
    /**
     * @var WeatherCurl
     */
    private WeatherCurl $curl;

    /**
     * @var StationTransformer
     */
    private StationTransformer $transformer;

    /**
     * StationDao constructor.
     * @param WeatherCurl $curl
     */
    public function __construct(WeatherCurl $curl)
    {
        $this->curl = $curl;
        $this->transformer = new StationTransformer;
    }

    /**
     * @param null|DaoCollectionParamInterface $params
     * @return Station[]
     */
    public function getData(DaoCollectionParamInterface $params = null): array
    {
        $data = $this->curl->stations();
        return array_map([$this->transformer, 'transform'], $data);
    }

    /**
     * @param Station[] $collection
     * @param ParamElement $filter
     * @return Station[]
     */
    public function setFilters(array $collection, ParamElement $filter): array
    {
        if(($filter->getParameter('city') !== null)) {
            $collection = array_filter($collection, fn(Station $model) =>
                $model->getCity()->getName() === $filter->getParameter('city')
            );
        }

        if(($filter->getParameter('id') !== null)) {
            $collection = array_filter($collection, fn(Station $model) =>
                in_array($model->getId(), $filter->getParameter('id'))
            );
        }

        return $collection;
    }
}