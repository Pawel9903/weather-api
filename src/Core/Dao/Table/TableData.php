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
     * @param int|null $id
     * @return array
     */
    protected function getFilteredData(?int $id = null): array
    {
        $collection = $this->dao->getData($id);
        return $this->dao->setFilters($collection, $this->request->get('filter')?? []);
    }
}