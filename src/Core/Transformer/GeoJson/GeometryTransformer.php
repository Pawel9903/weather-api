<?php declare(strict_types=1);

namespace App\Core\Transformer\GeoJson;

use App\Core\Model\GeoJson\Geometry;
use App\Core\Transformer\Transformer;

/**
 * Class GeometryTransformer
 * @package App\Core\Transformer\GeoJson
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class GeometryTransformer extends Transformer
{
    /**
     * @param $data
     * @param array $context
     * @return Geometry
     */
    public function transform($data, array $context = []): Geometry
    {
        $model = $context[self::INSTANCE] instanceof Geometry? $context[self::INSTANCE] : new Geometry();
        $this->setProps($model, $data);
        return $model;
    }

    /**
     * @param Geometry $model
     * @param $data
     */
    private function setProps(Geometry $model, $data): void
    {
        if(is_array($data)) {
            $this->setPropsByArray($model, $data);
        }
    }

    /**
     * @param Geometry $model
     * @param array $data
     */
    private function setPropsByArray(Geometry $model, array $data): void
    {
        $model
            ->setLat(!empty($data['lat'])? $data['lat'] : 0)
            ->setLon(!empty($data['lon'])? $data['lon'] : 0);
    }
}