<?php declare(strict_types=1);

namespace App\Core\Dao\DaoCollectionParam;

/**
 * Interface DaoCollectionParamInterface
 * @package App\Core\Dao\DaoCollectionParam
 */
interface DaoCollectionParamInterface
{
    /**
     * @return array
     */
    public function getFilter(): array;

    /**
     * @param array $filter
     * @return $this
     */
    public function setFilter(array $filter): self;

    /**
     * @return array
     */
    public function getParameters(): array;

    /**
     * @param array $parameters
     * @return $this
     */
    public function setParameters(array $parameters): self;

    /**
     * @return array
     */
    public function getRouteParam(): array;

    /**
     * @param array $routeParam
     * @return $this
     */
    public function setRouteParam(array $routeParam): self;

    /**
     * @return array
     */
    public function getAll(): array;
}