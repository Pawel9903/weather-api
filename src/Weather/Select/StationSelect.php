<?php declare(strict_types=1);

namespace App\Weather\Select;

use App\Core\Dao\DaoSelectDataInterface;
use App\Core\Select\SelectData;
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
     * @var StationDao
     */
    private StationDao $dao;

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
     * @return DaoSelectDataInterface
     */
    public function getDaoInstance(): DaoSelectDataInterface
    {
        return $this->dao;
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