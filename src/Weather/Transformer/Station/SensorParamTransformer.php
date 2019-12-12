<?php declare(strict_types=1);

namespace App\Weather\Transformer\Station;

use App\Core\Transformer\Transformer;
use App\Weather\Model\Station\SensorParam;

/**
 * Class SensorTransformer
 * @package App\Weather\Transformer\SensorParam
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class SensorParamTransformer extends Transformer
{

    /**
     * @param $data
     * @param array $context
     * @return SensorParam
     */
    public function transform($data, array $context = []): SensorParam
    {
        $model = $context[self::INSTANCE]?? new SensorParam();
        $this->setObjectProps($model, $data);
        return $model;
    }

    /**
     * @param SensorParam $model
     * @param $data
     */
    private function setObjectProps(SensorParam $model, $data): void
    {
        if(is_array($data)) {
            $this->setPropsByArray($model, $data);
        }
    }

    /**
     * @param SensorParam $model
     * @param array $data
     */
    private function setPropsByArray(SensorParam $model, array $data): void
    {
        $model
            ->setId(!empty($data['idParam'])? $data['idParam'] : null)
            ->setName(!empty($data['paramName'])? $data['paramName'] : '')
            ->setFormula(!empty($data['paramFormula'])? $data['paramFormula'] : '')
            ->setCode(!empty($data['paramCode'])? $data['paramCode'] : '');
    }
}