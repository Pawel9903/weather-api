<?php declare(strict_types=1);

namespace App\Core\Select;

use App\Core\Dao\DaoSelectDataInterface;

/**
 * Interface SelectDataInterface
 * @package App\Core\Select
 */
interface SelectDataInterface
{
    /**
     * @return DaoSelectDataInterface
     */
    public function getDaoInstance(): DaoSelectDataInterface;

    /**
     * @param array $collection
     * @return array
     */
    public function createSelectStructure(array $collection): array ;
}