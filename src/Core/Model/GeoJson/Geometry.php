<?php declare(strict_types=1);

namespace App\Core\Model\GeoJson;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Geometry
 * @package App\Core\Model\GeoJson
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class Geometry
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups("min", "max")
     */
    private string $type = "Point";

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\Groups("max")
     */
    private float $lon = 0;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\("max")
     */
    private float $lat = 0;

    /**
     * @return array
     * @Serializer\Type("array")
     * @Serializer\Groups("min", "max")
     * @Serializer\VirtualProperty()
     * @Serializer\SerializedName("coordinates")
     */
    public function coordinates(): array
    {
        return [$this->lon, $this->lat];
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return float
     */
    public function getLon(): float
    {
        return $this->lon;
    }

    /**
     * @param float $lon
     * @return $this
     */
    public function setLon(float $lon): self
    {
        $this->lon = $lon;
        return $this;
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     * @return $this
     */
    public function setLat(float $lat): self
    {
        $this->lat = $lat;
        return $this;
    }
}