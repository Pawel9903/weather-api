<?php declare(strict_types=1);

namespace App\Core\Dao\Table;

use App\Core\Dao\DaoCollectionInterface;

/**
 * Interface TableInterface
 * @package App\Core\Dao\Table
 */
interface TableInterface
{
    /**
     * @return DaoCollectionInterface
     */
    public function getDaoInstance(): DaoCollectionInterface;
}