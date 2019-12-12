<?php declare(strict_types=1);

namespace App\Weather\Dao;

use App\Core\Dao\DaoSelectDataInterface;
use App\Weather\Curl\StationCurl;
use App\Weather\Model\Station\Station;
use App\Weather\Transformer\Station\StationTransformer;

class StationDao implements DaoSelectDataInterface
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
     * @param StationTransformer $transformer
     * @param StationCurl $curl
     */
    public function __construct(StationTransformer $transformer, StationCurl $curl)
    {
        $this->curl = $curl;
        $this->transformer = $transformer;
    }

    /**
     * @return Station[]
     */
    public function getData(): array
    {
        $data = $this->curl->stations();
        return array_map([$this->transformer, 'transform'], $data);
    }

    /**
     * @param Station[] $collection
     * @param array $filter
     * @return Station[]
     */
    public function setSelectDataFilters(array $collection, array $filter = []): array
    {
        if(!empty($filter['city'])) {
            $collection = array_filter($collection, function (Station $model) use ($filter) {
                return $model->getCity()->getName() === $filter['city'];
            });
        }

        return $collection;
    }
}