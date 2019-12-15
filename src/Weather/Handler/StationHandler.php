<?php declare(strict_types=1);

namespace App\Weather\Handler;

use App\Core\Handler\Handler;
use App\Weather\Dao\Select\StationSelect;
use App\Weather\Dao\Table\StationTable;
use App\Weather\Model\Station\Station;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class StationHandler
 * @package App\Weather\Handler
 * @author Pawel Ged <pawelged9903@gmail.com>
 * @method $this handle(Request $request)
 */
class StationHandler extends Handler
{
    /**
     * @var StationSelect
     */
    private StationSelect $select;

    /**
     * @var StationTable
     */
    private StationTable $table;

    /**
     * StationHandler constructor.
     * @param StationTable $table
     * @param StationSelect $select
     */
    public function __construct(StationTable $table, StationSelect $select)
    {
        parent::__construct();
        $this->select = $select;
        $this->table = $table;
    }

    /**
     * @return array
     */
    public function select(): array
    {
        return $this->select->getResponse();
    }

    /**
     * @return Station[]
     */
    public function collection(): array
    {
        return $this->table->getResponse();
    }

    /**
     * @param Request|null $request
     * @return $this
     */
    protected function processing(Request $request = null): self
    {
        $this->select->setParams($request);
        $this->table->setParams($request);
        return $this;
    }
}