<?php declare(strict_types=1);

namespace App\Weather\Transformer\Station;

use App\Core\Transformer\Address\CityTransformer;
use App\Core\Transformer\GeoJson\GeoJsonTransformer;
use App\Core\Transformer\Transformer;
use App\Weather\Model\Station\Station;

/**
 * Class StationTransformer
 * @package App\Weather\Transformer
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class StationTransformer extends Transformer
{

    /**
     * @var GeoJsonTransformer
     */
    private GeoJsonTransformer $geoJsonTransformer;

    /**
     * @var CityTransformer
     */
    private CityTransformer $cityTransformer;

    /**
     * StationTransformer constructor.
     */
    public function __construct()
    {
        $this->geoJsonTransformer = new GeoJsonTransformer;
        $this->cityTransformer = new CityTransformer;
    }

    /**
     * @param $data
     * @param array $context
     * @return Station
     */
    public function transform($data, array $context = []): Station
    {
        $model = $context[self::INSTANCE]?? new Station();
        $this->setObjectProps($model, $data);
        return $model;
    }

    /**
     * @param Station $model
     * @param $data
     */
    private function setObjectProps(Station $model, $data): void
    {
        if(is_array($data)) {
            $this->setPropsByArray($model, $data);
        }
    }

    /**
     * @param Station $model
     * @param array $data
     */
    private function setPropsByArray(Station $model, array $data): void
    {
        $model
            ->setId(!empty($data['id'])? $data['id'] : null)
            ->setName(!empty($data['name'])? $data['name'] : '')
            ->setAddress(!empty($data['addressStreet'])? $data['addressStreet'] : '');

        $this->setCoordsByArray($model, $data);
    }

    /**
     * @param Station $model
     * @param array $data
     */
    private function setCoordsByArray(Station $model, array $data): void
    {
        $data['lat'] = !empty($data['gegrLat'])? $data['gegrLat'] : 0;
        $data['lon'] = !empty($data['gegrLon'])? $data['gegrLon'] : 0;

        $coords = $this->geoJsonTransformer->transform($data);
        $city = $this->cityTransformer->transform($data['city']?? []);
        $model->setCoords($coords)->setCity($city);
    }
}