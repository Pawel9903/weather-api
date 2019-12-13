<?php declare(strict_types=1);

namespace App\Core\Dao;

use App\Core\Dao\DaoCollectionParam\DaoCollectionParam;
use App\Core\Dao\DaoCollectionParam\DaoCollectionParamInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DaoCollection
 * @package App\Core\Dao
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
abstract class DaoCollection
{
    /**
     * @var DaoCollectionParamInterface
     */
    protected DaoCollectionParamInterface $params;

    /**
     * @var DaoCollectionInterface
     */
    protected DaoCollectionInterface $dao;

    /**
     * DaoCollection constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->setDao();
        $this->params = new DaoCollectionParam();
    }

    /**
     * @throws \Exception
     */
    private function setDao(): void
    {
        try {
            $this->dao = $this->getDaoInstance();
        }
        catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * @param Request $request
     */
    public function setParams(Request $request): void
    {
        $this->params
            ->setFilter($request->get('filter')?? [])
            ->setRouteParam($request->attributes->get('_route_params')?? [])
            ->setParameters($request->request->all()?? []);
    }

    /**
     * @return array
     */
    public function getResponse(): array
    {
        $data = $this->getFilteredData();
        return ['data' => $data, 'count' => count($data)];
    }

    /**
     * @return array
     */
    abstract protected function getFilteredData(): array;
}