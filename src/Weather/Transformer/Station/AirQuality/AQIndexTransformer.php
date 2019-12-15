<?php declare(strict_types=1);

namespace App\Weather\Transformer\Station\AirQuality;

use App\Core\Transformer\Transformer;
use App\Weather\Model\Station\AirQuality\AQSubstanceIndex;

/**
 * Class AQIndexTransformer
 * @package App\Weather\Transformer\Station
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class AQIndexTransformer extends Transformer
{

    /**
     * @param $data
     * @param array $context
     * @return AQSubstanceIndex
     */
    public function transform($data, array $context = []): AQSubstanceIndex
    {
        $model = $context[self::INSTANCE]?? new AQSubstanceIndex();
        $this->setObjectProps($model, $data);
        return $model;
    }

    /**
     * @param AQSubstanceIndex $model
     * @param $data
     */
    private function setObjectProps(AQSubstanceIndex $model, $data): void
    {
        if(is_array($data)) {
            $this->setPropsByArray($model, $data);
        }
    }

    /**
     * @param AQSubstanceIndex $model
     * @param array $data
     */
    private function setPropsByArray(AQSubstanceIndex $model, array $data): void
    {
        $model
            ->setId(!empty($data['id'])? $data['id'] : null)
            ->setStatus(!empty($data['indexLevelName'])? $data['indexLevelName'] : null);
    }
}