<?php declare(strict_types=1);

namespace App\Core\Model\Address;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Commune
 * @package App\Core\Model\Address
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class Commune
{

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups("min", "max")
     */
    private string $name;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups("min", "max")
     */
    private string $district;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups("min", "max")
     */
    private string $province;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDistrict(): string
    {
        return $this->district;
    }

    /**
     * @param string $district
     * @return $this
     */
    public function setDistrict(string $district): self
    {
        $this->district = $district;
        return $this;
    }

    /**
     * @return string
     */
    public function getProvince(): string
    {
        return $this->province;
    }

    /**
     * @param string $province
     * @return $this
     */
    public function setProvince(string $province): self
    {
        $this->province = $province;
        return $this;
    }
}