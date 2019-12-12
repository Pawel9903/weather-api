<?php declare(strict_types=1);

namespace App\Weather\Model\Station;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Sensor
 * @package App\Weather\Model\Station
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class Sensor
{
    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\Groups("min", "max")
     */
    private ?int $id = null;

    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\Groups("min", "max")
     */
    private ?int $stationId = null;

    /**
     * @var SensorParam
     * @Serializer\Type("object")
     * @Serializer\Groups("min", "max")
     */
    private SensorParam $param;

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
     * @return int|null
     */
    public function getStationId(): ?int
    {
        return $this->stationId;
    }

    /**
     * @param int|null $stationId
     * @return $this
     */
    public function setStationId(?int $stationId): self
    {
        $this->stationId = $stationId;
        return $this;
    }

    /**
     * @return SensorParam
     */
    public function getParam(): SensorParam
    {
        return $this->param;
    }

    /**
     * @param SensorParam $param
     * @return Sensor
     */
    public function setParam(SensorParam $param): Sensor
    {
        $this->param = $param;
        return $this;
    }
}