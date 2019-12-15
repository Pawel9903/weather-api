<?php declare(strict_types=1);

namespace App\Weather\Model\Station\AirQuality;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class AQSubstance
 * @package App\Weather\Model\Station\AirQuality
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class AQSubstance implements AQSubstanceInterface
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"min", "max"})
     */
    private string $name;

    /**
     * @var DateTime|null
     * @Serializer\Type("DateTime<'Y-m-d H:i:s'>")
     * @Serializer\Groups({"min", "max"})
     */
    private ?DateTime $sourceDate = null;

    /**
     * @var DateTime|null
     * @Serializer\Type("DateTime<'Y-m-d H:i:s'>")
     * @Serializer\Groups({"min", "max"})
     */
    private ?DateTime $calcDate = null;

    /**
     * @var AQSubstanceIndex|null
     * @Serializer\Type("App\Weather\Model\Station\AirQuality\AQSubstanceIndex")
     * @Serializer\Groups({"min", "max"})
     */
    private ?AQSubstanceIndex $index = null;

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
     * @return DateTime|null
     */
    public function getSourceDate(): ?DateTime
    {
        return $this->sourceDate;
    }

    /**
     * @param DateTime|null $sourceDate
     * @return $this
     */
    public function setSourceDate(?DateTime $sourceDate): self
    {
        $this->sourceDate = $sourceDate;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getCalcDate(): ?DateTime
    {
        return $this->calcDate;
    }

    /**
     * @param DateTime|null $calcDate
     * @return $this
     */
    public function setCalcDate(?DateTime $calcDate): self
    {
        $this->calcDate = $calcDate;
        return $this;
    }

    /**
     * @return AQSubstanceIndex|null
     */
    public function getIndex(): ?AQSubstanceIndex
    {
        return $this->index;
    }

    /**
     * @param AQSubstanceIndex|null $index
     * @return $this
     */
    public function setIndex(?AQSubstanceIndex $index): self
    {
        $this->index = $index;
        return $this;
    }
}