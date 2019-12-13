<?php declare(strict_types=1);

namespace App\Core\Transformer\Address;

use App\Core\Model\Address\City;
use App\Core\Transformer\Transformer;

/**
 * Class CityTransformer
 * @package App\Core\Transformer\City
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class CityTransformer extends Transformer
{
    /**
     * @var CommuneTransformer
     */
    private CommuneTransformer $CommuneTransformer;

    /**
     * CityTransformer constructor.
     */
    public function __construct()
    {
        $this->CommuneTransformer = new CommuneTransformer;
    }

    /**
     * @param $data
     * @param array $context
     * @return City
     */
    public function transform($data, array $context = []): City
    {
        $model = $context[self::INSTANCE]?? new City();
        $this->setObjectProps($model, $data);
        return $model;
    }

    /**
     * @param City $model
     * @param $data
     */
    private function setObjectProps(City $model, $data): void
    {
        if(is_array($data)) {
            $this->setPropsByArray($model, $data);
        }
    }

    /**
     * @param City $model
     * @param array $data
     */
    private function setPropsByArray(City $model, array $data): void
    {
        $commune = $this->CommuneTransformer->transform($data['commune']?? []);
        $model
            ->setName(!empty($data['name'])? $data['name'] : '')
            ->setId(!empty($data['id'])? $data['id'] : null)
            ->setCommune($commune);
    }
}