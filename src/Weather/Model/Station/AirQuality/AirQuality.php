<?php declare(strict_types=1);

namespace App\Weather\Model\Station\AirQuality;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class AirQuality
 * @package App\Weather\Model\Station\AirQuality
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class AirQuality
{
    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\Groups({"min", "max"})
     */
    private ?int $id = null;

    /**
     * @var AQSubstanceInterface[]
     * @Serializer\Type("array<App\Weather\Model\Station\AirQuality\AQSubstance>")
     * @Serializer\Groups({"min", "max"})
     */
    private array $substances;

    /**
     * @var bool|null
     * @Serializer\Type("bool")
     * @Serializer\Groups({"min", "max"})
     */
    private ?bool $indexStatus = null;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\Groups({"min", "max"})
     */
    private ?string $indexCRParam = null;

    /**
     * @return AQSubstanceInterface[]
     */
    public function getSubstances(): array
    {
        return $this->substances;
    }

    /**
     * @param AQSubstanceInterface[] $substances
     * @return $this
     */
    public function setSubstances(array $substances): self
    {
        array_map(fn(AQSubstanceInterface $substance) => $this->addSubstance($substance), $substances);
        return $this;
    }

    /**
     * @param AQSubstanceInterface $substance
     * @return $this
     */
    public function addSubstance(AQSubstanceInterface $substance): self
    {
        $this->substances[] = $substance;
        return $this;
    }

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
     * @return bool|null
     */
    public function getIndexStatus(): ?bool
    {
        return $this->indexStatus;
    }

    /**
     * @param bool|null $indexStatus
     * @return $this
     */
    public function setIndexStatus(?bool $indexStatus): self
    {
        $this->indexStatus = $indexStatus;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIndexCRParam(): ?string
    {
        return $this->indexCRParam;
    }

    /**
     * @param string|null $indexCRParam
     * @return $this
     */
    public function setIndexCRParam(?string $indexCRParam): self
    {
        $this->indexCRParam = $indexCRParam;
        return $this;
    }
}