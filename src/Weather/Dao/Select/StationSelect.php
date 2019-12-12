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
}