<?php declare(strict_types=1);

namespace App\Core\Dao;

use App\Core\Dao\DaoCollectionParam\DaoCollectionParamInterface;

/**
 * Interface DaoCollectionInterface
 * @package App\Core\Dao
 */
interface DaoCollectionInterface
{
    /**
     * @param array $collection
     * @param array $filter
     * @return array
     */
    public function setFilters(array $collection, array $filter = []): array;

    /**
     * @param null|DaoCollectionParamInterface $params
     * @return array
     */
    public function getData(DaoCollectionParamInterface $params): array;
}