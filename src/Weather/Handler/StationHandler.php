<?php declare(strict_types=1);

namespace App\Weather\Handler;

use App\Core\Handler\Handler;
use App\Weather\Dao\Select\StationSelect;
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
     * StationHandler constructor.
     * @param StationSelect $select
     */
    public function __construct(StationSelect $select)
    {
        parent::__construct();
        $this->select = $select;
    }

    /**
     * @return array
     */
    public function select(): array
    {
        return $this->select->getResponse();
    }

    /**
     * @param Request $request
     * @return $this
     */
    protected function processing(Request $request): self
    {
        $this->select->setRequest($request);
        return $this;
    }
}