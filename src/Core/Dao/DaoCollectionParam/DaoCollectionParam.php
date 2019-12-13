<?php declare(strict_types=1);

namespace App\Core\Dao\DaoCollectionParam;

/**
 * Class DaoCollectionParam
 * @package App\Core\Dao\DaoCollectionParam
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class DaoCollectionParam implements DaoCollectionParamInterface
{
    /**
     * @var array
     */
    private array $params = [
        'route_param' => [],
        'parameters' => [],
        'filter' => [],
    ];

    /**
     * @return array
     */
    public function getFilter(): array
    {
        return $this->params['filter'];
    }

    /**
     * @param array $filter
     * @return $this
     */
    public function setFilter(array $filter): self
    {
        $this->params['filter'] = $filter;
        return $this;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->params['parameters'];
    }

    /**
     * @param array $parameters
     * @return $this
     */
    public function setParameters(array $parameters): DaoCollectionParamInterface
    {
        $this->params['parameters'] = $parameters;
        return $this;
    }

    /**
     * @return array
     */
    public function getRouteParam(): array
    {
        return $this->params['route_param'];
    }

    /**
     * @param array $routeParam
     * @return $this
     */
    public function setRouteParam(array $routeParam): DaoCollectionParamInterface
    {
        $this->params['route_param'] = $routeParam;
        return $this;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        $this->params;
    }
}