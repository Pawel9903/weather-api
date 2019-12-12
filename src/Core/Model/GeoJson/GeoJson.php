<?php declare(strict_types=1);

namespace App\Core\Model\GeoJson;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class GeoJson
 * @package App\Core\Model
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class GeoJson
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups("min", "max")
     */
    private string $type = "Feature";

    /**
     * @var Geometry
     * @Serializer\Type("object")
     * @Serializer\Groups("min", "max")
     */
    private Geometry $geometry;

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
     * @return Geometry
     */
    public function getGeometry(): Geometry
    {
        return $this->geometry;
    }

    /**
     * @param Geometry $geometry
     * @return $this
     */
    public function setGeometry(Geometry $geometry): self
    {
        $this->geometry = $geometry;
        return $this;
    }
}