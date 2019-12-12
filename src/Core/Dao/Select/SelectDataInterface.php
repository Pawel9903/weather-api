<?php declare(strict_types=1);

namespace App\Core\Dao\Select;

use App\Core\Dao\DaoCollectionInterface;

/**
 * Interface SelectDataInterface
 * @package App\Core\Dao\Select
 */
interface SelectDataInterface
{
    /**
     * @return DaoCollectionInterface
     */
    public function getDaoInstance(): DaoCollectionInterface;

    /**
     * @param array $collection
     * @return array
     */
    public function createSelectStructure(array $collection): array;
}