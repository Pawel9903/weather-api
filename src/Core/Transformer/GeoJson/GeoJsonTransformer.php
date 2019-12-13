<?php declare(strict_types=1);

namespace App\Core\Transformer\GeoJson;

use App\Core\Model\GeoJson\GeoJson;
use App\Core\Transformer\Transformer;

/**
 * Class GeoJsonTransformer
 * @package App\Core\Transformer\GeoJson
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class GeoJsonTransformer extends Transformer
{
    /**
     * @var GeometryTransformer
     */
    private GeometryTransformer $geometryTransformer;

    /**
     * GeoJsonTransformer constructor.
     */
    public function __construct()
    {
        $this->geometryTransformer = new GeometryTransformer;
    }

    /**
     * @param $data
     * @param array $context
     * @return GeoJson
     */
    public function transform($data, array $context = []): GeoJson
    {
        $model = $context[self::INSTANCE]?? new GeoJson();
        $this->setObjectProps($model, $data);
        return $model;
    }

    /**
     * @param GeoJson $model
     * @param $data
     */
    private function setObjectProps(GeoJson $model, $data): void
    {
        if(is_array($data)) {
            $this->setPropsByArray($model, $data);
        }
    }

    /**
     * @param GeoJson $model
     * @param array $data
     */
    private function setPropsByArray(GeoJson $model, array $data): void
    {
        $geometry = $this->geometryTransformer->transform($data);
        $model->setGeometry($geometry);
    }
}