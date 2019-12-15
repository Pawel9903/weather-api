<?php declare(strict_types=1);

namespace App\Weather\Model\Station\AirQuality;

use DateTime;

/**
 * Interface AQSubstanceInterface
 * @package App\Weather\Model\Station\AirQuality
 */
interface AQSubstanceInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self;

    /**
     * @return DateTime|null
     */
    public function getSourceData(): ?DateTime;

    /**
     * @param DateTime|null $sourceData
     * @return $this
     */
    public function setSourceData(?DateTime $sourceData): self;

    /**
     * @return DateTime|null
     */
    public function getCalcDate(): ?DateTime;

    /**
     * @param DateTime|null $calcDate
     * @return $this
     */
    public function setCalcDate(?DateTime $calcDate): self;

    /**
     * @return AQSubstanceIndex|null
     */
    public function getIndex(): ?AQSubstanceIndex;

    /**
     * @param AQSubstanceIndex|null $index
     * @return $this
     */
    public function setIndex(?AQSubstanceIndex $index): self;
}