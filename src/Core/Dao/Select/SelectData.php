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
    public function getData(): array
    {
        $collection = $this->dao->getData();
        $filteredCollection = $this->dao->setFilters($collection, $this->request->get('filter')?? []);
        return $this->createSelectStructure($filteredCollection);
    }
}