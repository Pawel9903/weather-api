<?php declare(strict_types=1);

namespace App\Weather\Dao\Select;

use App\Core\Dao\DaoCollectionInterface;
use App\Core\Dao\Select\SelectData;
use App\Weather\Dao\StationDao;
use App\Weather\Model\Station\Station;

/**
 * Class StationSelect
 * @package App\Weather\Select
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class StationSelect extends SelectData
{
    /**
     * @var DaoCollectionInterface
     */
    protected DaoCollectionInterface $dao;

    /**
     * StationSelect constructor.
     * @param StationDao $dao
     * @throws \Exception
     */
    public function __construct(StationDao $dao)
    {
        $this->dao = $dao;
        parent::__construct();
    }

    /**
     * @return DaoCollectionInterface
     */
    public function getDaoInstance(): DaoCollectionInterface
    {
        return $this->dao;
    }

    /**
     * @param Station[] $collection
     * @return Station[]
     */
    public function createSelectStructure(array $collection): array
    {
        $selectData = array_map(fn(Station $model) => ['key' => [$model->getId()], 'value' => $model->getCity()->getName()] , $collection);
        return $this->groupByCitiesValue($selectData);

    }

    /**
     * @param array $selectData
     * @return array
     */
    private function groupByCitiesValue(array $selectData): array
    {
        $groupedSelectData = [];
        foreach ($selectData as $key => $elem) {
            $searchKey = $this->searchKeyExistingValue($groupedSelectData, $elem['value']);
            if($searchKey !== false) {
                $groupedSelectData[$searchKey]['key'][] = reset($elem['key']);
            }
            else {
                $groupedSelectData[] = $elem;
            }
        }
        return $groupedSelectData;
    }

    /**
     * @param array $selectData
     * @param string $value
     * @return false|int|string
     */
    private function searchKeyExistingValue(array $selectData, string $value)
    {
        return array_search($value, array_column($selectData, 'value'));
    }
}