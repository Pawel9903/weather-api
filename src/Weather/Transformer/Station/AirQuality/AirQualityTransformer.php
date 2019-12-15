<?php declare(strict_types=1);

namespace App\Weather\Transformer\Station\AirQuality;

use App\Core\Transformer\Transformer;
use App\Weather\Model\Station\AirQuality\AirQuality;
use App\Weather\Model\Station\AirQuality\AQSubstanceNameEnum;

/**
 * Class AirQualityTransformer
 * @package App\Weather\Transformer\Station
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class AirQualityTransformer extends Transformer
{
    /**
     * @var AQSubstanceTransformer
     */
    private AQSubstanceTransformer $AQSubstanceTransformer;

    /**
     * AQSubstanceTransformer constructor.
     */
    public function __construct()
    {
        $this->AQSubstanceTransformer = new AQSubstanceTransformer();
    }

    /**
     * @param $data
     * @param array $context
     * @return AirQuality
     * @throws \Exception
     */
    public function transform($data, array $context = []): AirQuality
    {
        $model = $context[self::INSTANCE]?? new AirQuality();
        $this->setObjectProps($model, $data);
        return $model;
    }

    /**
     * @param AirQuality $model
     * @param $data
     * @throws \Exception
     */
    private function setObjectProps(AirQuality $model, $data): void
    {
        if(is_array($data)) {
            $this->setPropsByArray($model, $data);
        }
    }

    /**
     * @param AirQuality $model
     * @param array $data
     * @throws \Exception
     */
    private function setPropsByArray(AirQuality $model, array $data): void
    {
        $model
            ->setId(!empty($data['id'])? $data['id'] : null)
            ->setIndexStatus(!empty($data['stIndexStatus'])? $data['stIndexStatus'] : null)
            ->setIndexCRParam(!empty($data['stIndexCrParam'])? $data['stIndexCrParam'] : null);

        $this->setSubstancesByArray($model, $data);
    }

    /**
     * @param AirQuality $model
     * @param array $data
     * @throws \Exception
     */
    private function setSubstancesByArray(AirQuality $model, array $data): void
    {
        $this->setSingleSubstance($model, [
            'name' => AQSubstanceNameEnum::SO2,
            'calcDate' => $data['so2CalcDate']?? null,
            'sourceDate' => $data['so2SourceDataDate']?? null,
            'index' => $data['so2IndexLevel']?? null
        ]);

        $this->setSingleSubstance($model, [
            'name' => AQSubstanceNameEnum::NO2,
            'calcDate' => $data['no2CalcDate']?? null,
            'sourceDate' => $data['no2SourceDataDate']?? null,
            'index' => $data['no2IndexLevel']?? null
        ]);

        $this->setSingleSubstance($model, [
            'name' => AQSubstanceNameEnum::CO,
            'calcDate' => $data['coCalcDate']?? null,
            'sourceDate' => $data['coSourceDataDate']?? null,
            'index' => $data['coIndexLevel']?? null
        ]);

        $this->setSingleSubstance($model, [
            'name' => AQSubstanceNameEnum::PM10,
            'calcDate' => $data['pm10CalcDate']?? null,
            'sourceDate' => $data['pm10SourceDataDate']?? null,
            'index' => $data['pm10IndexLevel']?? null
        ]);

        $this->setSingleSubstance($model, [
            'name' => AQSubstanceNameEnum::PM25,
            'calcDate' => $data['pm25CalcDate']?? null,
            'sourceDate' => $data['pm25SourceDataDate']?? null,
            'index' => $data['pm25IndexLevel']?? null
        ]);

        $this->setSingleSubstance($model, [
            'name' => AQSubstanceNameEnum::O3,
            'calcDate' => $data['so2CalcDate']?? null,
            'sourceDate' => $data['o3SourceDataDate']?? null,
            'index' => $data['o3IndexLevel']?? null
        ]);

        $this->setSingleSubstance($model, [
            'name' => AQSubstanceNameEnum::C6H6,
            'calcDate' => $data['c6h6CalcDate']?? null,
            'sourceDate' => $data['c6h6SourceDataDate']?? null,
            'index' => $data['c6h6IndexLevel']?? null
        ]);
    }

    /**
     * @param AirQuality $model
     * @param array $data
     * @throws \Exception
     */
    private function setSingleSubstance(AirQuality $model, array $data): void
    {
        $AQSubstance = $this->AQSubstanceTransformer->transform($data);
        $model->addSubstance($AQSubstance);
    }
}