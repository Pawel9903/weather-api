<?php declare(strict_types=1);

namespace App\Core\Dao\Table;

use App\Core\Dao\DaoCollection;

/**
 * Class TableData
 * @package App\Core\Dao\Table
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
abstract class TableData extends DaoCollection implements TableInterface
{
    /**
     * @return array
     */
    protected function getFilteredData(): array
    {
        $collection = $this->dao->getData();
        return $this->dao->setFilters($collection, $this->request->get('filter')?? []);
    }
}