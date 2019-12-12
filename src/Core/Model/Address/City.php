<?php declare(strict_types=1);

namespace App\Core\Model\Address;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class City
 * @package App\Core\Model\GeoJson
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class City
{
    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\Groups("min", "max")
     */
    private ?int $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups("min", "max")
     */
    private string $name;

    /**
     * @var Commune
     * @Serializer\Type("object")
     * @Serializer\Groups("min", "max")
     */
    private Commune $commune;

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
     * @return Commune
     */
    public function getCommune(): Commune
    {
        return $this->commune;
    }

    /**
     * @param Commune $commune
     * @return $this
     */
    public function setCommune(Commune $commune): self
    {
        $this->commune = $commune;
        return $this;
    }
}