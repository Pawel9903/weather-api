<?php declare(strict_types=1);

use App\Weather\Curl\StationCurl;
use App\Weather\Model\Station\Station;
use App\Weather\Transformer\Station\StationTransformer;

class StationDao
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
    public function stations(): array
    {
        $data = $this->curl->stations();
        return array_map([$this->transformer, 'transform'], $data);
    }
}