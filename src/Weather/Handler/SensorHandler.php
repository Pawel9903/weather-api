<?php declare(strict_types=1);

namespace App\Weather\Handler;

use App\Core\Handler\Handler;
use App\Weather\Dao\Table\SensorTable;
use App\Weather\Model\Station\Sensor;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SensorHandler
 * @package App\Weather\Handler
 * @author Pawel Ged <pawelged9903@gmail.com>
 * @method $this handle(Request $request)
 */
class SensorHandler extends Handler
{
    /**
     * @var SensorTable
     */
    private SensorTable $table;

    /**
     * SensorHandler constructor.
     * @param SensorTable $table
     */
    public function __construct(SensorTable $table)
    {
        parent::__construct();
        $this->table = $table;
    }

    /**
     * @param int|null $id
     * @return Sensor[]
     */
    public function collection(?int $id): array
    {
        return $this->table->getResponse($id);
    }

    /**
     * @param Request $request
     * @return $this
     */
    protected function processing(Request $request): self
    {
        $this->table->setRequest($request);
        return $this;
    }
}