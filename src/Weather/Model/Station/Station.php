<?php declare(strict_types=1);

namespace App\Weather\Model\Station;

use App\Core\Model\GeoJson\GeoJson;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Station
 * @package App\Weather\Model\Station
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class Station
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\Groups("min", "max")
     */
    private int $id;

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
    private string $address;

    /**
     * @var GeoJson
     */
    private GeoJson $coords;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

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
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return $this
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return GeoJson
     */
    public function getCoords(): GeoJson
    {
        return $this->coords;
    }

    /**
     * @param GeoJson $coords
     * @return $this
     */
    public function setCoords(GeoJson $coords): self
    {
        $this->coords = $coords;
        return $this;
    }
}