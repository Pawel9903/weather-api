<?php declare(strict_types=1);

namespace App\Weather\Dao\Table;

use App\Core\Dao\DaoCollectionInterface;
use App\Core\Dao\Table\TableData;
use App\Weather\Dao\SensorDao;

/**
 * Class SensorTable
 * @package App\Weather\Dao\Table
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class SensorTable extends TableData
{
    /**
     * @var DaoCollectionInterface
     */
    protected DaoCollectionInterface $dao;

    /**
     * StationSelect constructor.
     * @param SensorDao $dao
     * @throws \Exception
     */
    public function __construct(SensorDao $dao)
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