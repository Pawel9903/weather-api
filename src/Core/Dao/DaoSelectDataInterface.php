<?php declare(strict_types=1);

namespace App\Core\Dao;

/**
 * Interface DaoSelectDataInterface
 * @package App\Core\Dao
 */
interface DaoSelectDataInterface
{
    /**
     * @param array $collection
     * @param array $filter
     * @return array
     */
    public function setSelectDataFilters(array $collection, array $filter = []): array;

    /**
     * @return array
     */
    public function getData(): array;
}