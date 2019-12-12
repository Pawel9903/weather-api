<?php declare(strict_types=1);

namespace App\Core\Transformer\Address;

use App\Core\Model\Address\Commune;
use App\Core\Transformer\Transformer;

/**
 * Class CommuneTransformer
 * @package App\Core\Transformer\Commune
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class CommuneTransformer extends Transformer
{

    /**
     * @param $data
     * @param array $context
     * @return Commune
     */
    public function transform($data, array $context = []): Commune
    {
        $model = $context[self::INSTANCE]?? new Commune();
        $this->setObjectProps($model, $data);
        return $model;
    }

    /**
     * @param Commune $model
     * @param $data
     */
    private function setObjectProps(Commune $model, $data): void
    {
        if(is_array($data)) {
            $this->setPropsByArray($model, $data);
        }
    }

    /**
     * @param Commune $model
     * @param array $data
     */
    private function setPropsByArray(Commune $model, array $data): void
    {
        $model
            ->setName(!empty($data['communeName'])? $data['communeName'] : '')
            ->setDistrict(!empty($data['districtName'])? $data['districtName'] : '')
            ->setProvince(!empty($data['provinceName'])? $data['provinceName'] : '');
    }
}