<?php declare(strict_types=1);

namespace App\Core\Dao;

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
     * @param int|null $id
     * @return array
     */
    public function getData(?int $id = null): array;
}