<?php declare(strict_types=1);

namespace App\Weather\Dao\Table;

use App\Core\Dao\DaoCollectionInterface;
use App\Core\Dao\Select\SelectData;
use App\Core\Dao\Table\TableData;
use App\Weather\Dao\StationDao;
use App\Weather\Model\Station\Station;

/**
 * Class StationTable
 * @package App\Weather\Dao\Table
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class StationTable extends TableData
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
}