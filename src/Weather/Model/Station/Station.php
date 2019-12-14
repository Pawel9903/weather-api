<?php declare(strict_types=1);

namespace App\Weather\Model\Station;

use App\Core\Model\Address\City;
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
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\Groups({"min", "max"})
     */
    private ?int $id = null;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"min", "max"})
     */
    private string $name;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"min", "max"})
     */
    private string $address;

    /**
     * @var GeoJson
     * @Serializer\Type("App\Core\Model\GeoJson\GeoJson")
     * @Serializer\Groups({"min", "max"})
     */
    private GeoJson $coords;

    /**
     * @var City
     * @Serializer\Type("App\Core\Model\Address\City")
     * @Serializer\Groups({"min", "max"})
     */
    private City $city;

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

    /**
     * @return City
     */
    public function getCity(): City
    {
        return $this->city;
    }

    /**
     * @param City $city
     * @return $this
     */
    public function setCity(City $city): self
    {
        $this->city = $city;
        return $this;
    }
}