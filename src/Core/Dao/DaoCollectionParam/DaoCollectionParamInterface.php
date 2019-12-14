<?php declare(strict_types=1);

namespace App\Core\Dao\DaoCollectionParam;

/**
 * Interface DaoCollectionParamInterface
 * @package App\Core\Dao\DaoCollectionParam
 */
interface DaoCollectionParamInterface
{
    /**
     * @return ParamElement
     */
    public function getFilter(): ParamElement;

    /**
     * @param array $filter
     * @return $this
     */
    public function setFilter(array $filter): self;

    /**
     * @return ParamElement
     */
    public function getParameters(): ParamElement;

    /**
     * @param array $params
     * @return $this
     */
    public function setParameters(array $params): self;

    /**
     * @return ParamElement
     */
    public function getRouteParams(): ParamElement;

    /**
     * @param array $routeParams
     * @return $this
     */
    public function setRouteParams(array $routeParams): self ;

    /**
     * @return array
     */
    public function getAll(): array;
}