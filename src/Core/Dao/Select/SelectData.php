<?php declare(strict_types=1);

namespace App\Core\Dao\Select;

use App\Core\Dao\DaoCollection;

/**
 * Class SelectData
 * @package App\Core\Dao\Select
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
abstract class SelectData extends DaoCollection implements SelectDataInterface
{
    /**
     * @return array
     */
    protected function getFilteredData(): array
    {
        $collection = $this->dao->getData($this->params);
        $filteredCollection = $this->dao->setFilters($collection, $this->params->getFilter());
        return $this->createSelectStructure($filteredCollection);
    }

    /**
     * @param array $collection
     * @return array
     */
    abstract public function createSelectStructure(array $collection): array;
}