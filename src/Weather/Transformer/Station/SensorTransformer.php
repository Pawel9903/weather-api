<?php declare(strict_types=1);

namespace App\Weather\Transformer\Station;

use App\Core\Transformer\Transformer;
use App\Weather\Model\Station\Sensor;

/**
 * Class SensorTransformer
 * @package App\Weather\Transformer\Sensor
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class SensorTransformer extends Transformer
{

    /**
     * @var SensorParamTransformer
     */
    private SensorParamTransformer $sensorParamTransformer;

    /**
     * SensorTransformer constructor.
     * @param SensorParamTransformer $sensorParamTransformer
     */
    public function __construct(SensorParamTransformer $sensorParamTransformer)
    {
        $this->sensorParamTransformer = $sensorParamTransformer;
    }

    /**
     * @param $data
     * @param array $context
     * @return Sensor
     */
    public function transform($data, array $context = []): Sensor
    {
        $model = $context[self::INSTANCE]?? new Sensor();
        $this->setObjectProps($model, $data);
        return $model;
    }

    /**
     * @param Sensor $model
     * @param $data
     */
    private function setObjectProps(Sensor $model, $data): void
    {
        if(is_array($data)) {
            $this->setPropsByArray($model, $data);
        }
    }

    /**
     * @param Sensor $model
     * @param array $data
     */
    private function setPropsByArray(Sensor $model, array $data): void
    {
        $sensorParam = $this->sensorParamTransformer->transform($data['param']?? []);
        $model
            ->setId(!empty($data['id']) ? $data['id'] : null)
            ->setStationId(!empty($data['stationId']) ? $data['stationId'] : null)
            ->setParam($sensorParam);
    }
}