<?php declare(strict_types=1);

namespace App\Core\Dao\DaoCollectionParam;

/**
 * Class Param
 * @package App\Core\Dao\DaoCollectionParam
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class Param implements ParamElement
{
    /**
     * @var array
     */
    private array $params = [];

    /**
     * @param string $key
     * @return mixed|null
     */
    public function getParameter(string $key)
    {
        return $this->params[$key]?? null;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->params;
    }

    /**
     * @param array $params
     * @return $this
     */
    public function setParams(array $params): self
    {
        $this->params = $params;
        return $this;
    }
}