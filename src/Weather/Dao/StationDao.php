<?php declare(strict_types=1);

namespace App\Weather\Dao;

use App\Core\Dao\DaoCollectionInterface;
use App\Core\Dao\DaoCollectionParam\DaoCollectionParamInterface;
use App\Core\Dao\DaoCollectionParam\ParamElement;
use App\Weather\Curl\StationCurl;
use App\Weather\Model\Station\Station;
use App\Weather\Transformer\Station\StationTransformer;

class StationDao implements DaoCollectionInterface
{
    /**
     * @var StationCurl
     */
    private StationCurl $curl;

    /**
     * @var StationTransformer
     */
    private StationTransformer $transformer;

    /**
     * StationDao constructor.
     * @param StationCurl $curl
     */
    public function __construct(StationCurl $curl)
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

        return $collection;
    }
}