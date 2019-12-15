<?php declare(strict_types=1);

namespace App\Weather\Model\Station\AirQuality;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class AQSubstanceIndex
 * @package App\Weather\Model\Station\AirQuality
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class AQSubstanceIndex
{
    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\Groups({"min", "max"})
     */
    private ?int $id = null;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"min", "max"})
     */
    private ?string $status = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return $this
     */
    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     * @return $this
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }
}