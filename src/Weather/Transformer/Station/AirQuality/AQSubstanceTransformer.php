<?php declare(strict_types=1);

namespace App\Weather\Transformer\Station\AirQuality;

use App\Core\Transformer\Transformer;
use App\Weather\Model\Station\AirQuality\AQSubstance;
use App\Weather\Model\Station\AirQuality\AQSubstanceInterface;
use DateTime;

/**
 * Class AQSubstanceTransformer
 * @package App\Weather\Transformer\Station
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class AQSubstanceTransformer extends Transformer
{
    /**
     * @var AQIndexTransformer
     */
    private AQIndexTransformer $AQIndexTransformer;

    /**
     * AQSubstanceTransformer constructor.
     */
    public function __construct()
    {
        $this->AQIndexTransformer = new AQIndexTransformer();
    }

    /**
     * @param $data
     * @param array $context
     * @return AQSubstanceInterface
     * @throws \Exception
     */
    public function transform($data, array $context = []): AQSubstanceInterface
    {
        $model = $context[self::INSTANCE]?? new AQSubstance();
        $this->setObjectProps($model, $data);
        return $model;
    }

    /**
     * @param AQSubstanceInterface $model
     * @param $data
     * @throws \Exception
     */
    private function setObjectProps(AQSubstanceInterface $model, $data): void
    {
        if(is_array($data)) {
            $this->setPropsByArray($model, $data);
        }
    }

    /**
     * @param AQSubstanceInterface $model
     * @param array $data
     * @throws \Exception
     */
    private function setPropsByArray(AQSubstanceInterface $model, array $data): void
    {
        $AQSubstanceIndex = $this->AQIndexTransformer->transform($data['index']?? []);

        $model
            ->setName(!empty($data['name'])? $data['name'] : '')
            ->setCalcDate(!empty($data['calcDate']) && is_string($data['calcDate'])? new DateTime($data['calcDate']) : null)
            ->setSourceData(!empty($data['sourceDate']) && is_string($data['calcDate'])? new DateTime($data['sourceDate']) : null)
            ->setIndex($AQSubstanceIndex);
    }
}