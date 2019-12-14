<?php declare(strict_types=1);

namespace App\Core\Dao;

use App\Core\Dao\DaoCollectionParam\DaoCollectionParamInterface;
use App\Core\Dao\DaoCollectionParam\ParamElement;

/**
 * Interface DaoCollectionInterface
 * @package App\Core\Dao
 */
interface DaoCollectionInterface
{
    /**
     * @param array $collection
     * @param ParamElement $filter
     * @return array
     */
    public function setFilters(array $collection, ParamElement $filter): array;

    /**
     * @param null|DaoCollectionParamInterface $params
     * @return array
     */
    public function getData(DaoCollectionParamInterface $params): array;
}