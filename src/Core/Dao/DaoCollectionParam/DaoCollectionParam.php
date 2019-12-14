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
     * @var ParamElement
     */
    private ParamElement $routeParams;

    /**
     * @var ParamElement
     */
    private ParamElement $params;

    /**
     * @var ParamElement
     */
    private ParamElement $filter;

    /**
     * DaoCollectionParam constructor.
     */
    public function __construct()
    {
        $this->routeParams = new Param;
        $this->params = new Param;
        $this->filter = new Param;
    }

    /**
     * @return ParamElement
     */
    public function getFilter(): ParamElement
    {
        return $this->filter;
    }

    /**
     * @param array $filter
     * @return $this
     */
    public function setFilter(array $filter): self
    {
        $this->filter->setParams($filter);
        return $this;
    }

    /**
     * @return ParamElement
     */
    public function getParameters(): ParamElement
    {
        return $this->params;
    }

    /**
     * @param array $params
     * @return $this
     */
    public function setParameters(array $params): self
    {
        $this->params->setParams($params);
        return $this;
    }

    /**
     * @return ParamElement
     */
    public function getRouteParams(): ParamElement
    {
        return $this->routeParams;
    }

    /**
     * @param array $routeParams
     * @return $this
     */
    public function setRouteParams(array $routeParams): self
    {
        $this->routeParams->setParams($routeParams);
        return $this;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return [
            'route_param' => $this->routeParams,
            'params' => $this->params,
            'filter' => $this->filter,
        ];
    }
}