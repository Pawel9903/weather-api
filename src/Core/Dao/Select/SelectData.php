<?php declare(strict_types=1);

namespace App\Core\Dao\Select;

use App\Core\Dao\DaoCollection;
use App\Weather\Model\Station\Station;

/**
 * Class SelectData
 * @package App\Core\Dao\Select
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
abstract class SelectData extends DaoCollection implements SelectDataInterface
{
    /**
     * @param int|null $id
     * @return array
     */
    protected function getFilteredData(?int $id = null): array
    {
        $collection = $this->dao->getData($id);
        $filteredCollection = $this->dao->setFilters($collection, $this->request->get('filter')?? []);
        return $this->createSelectStructure($filteredCollection);
    }

    /**
     * @param Station[] $collection
     * @return Station[]
     */
    public function createSelectStructure(array $collection): array
    {
        return array_map(fn(Station $model) => ['key' => $model->getId(), 'value' => $model->getCity()->getName()] , $collection);
    }
}