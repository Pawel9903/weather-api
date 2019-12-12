<?php declare(strict_types=1);

namespace App\Weather\Model\Station;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class SensorParam
 * @package App\Weather\Model\Station
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class SensorParam
{
    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\Groups("min", "max")
     */
    private ?int $id = null;

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
    private string $formula;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups("min", "max")
     */
    private string $code;

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
    public function getFormula(): string
    {
        return $this->formula;
    }

    /**
     * @param string $formula
     * @return $this
     */
    public function setFormula(string $formula): self
    {
        $this->formula = $formula;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCode(string $code): self
    {
        $this->code = $code;
        return $this;
    }
}