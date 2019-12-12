<?php declare(strict_types=1);

namespace App\Core\Select;

use App\Core\Dao\DaoSelectDataInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SelectData
 * @package App\Core\Select
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
abstract class SelectData implements SelectDataInterface
{
    /**
     * @var Request
     */
    private Request $request;

    /**
     * @var DaoSelectDataInterface
     */
    private DaoSelectDataInterface $dao;

    /**
     * SelectData constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->setDao();
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
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function select(): array
    {
        $collection = $this->dao->getData();
        $filteredCollection = $this->dao->setSelectDataFilters($collection, $this->request->get('filter')?? []);
        return $this->createSelectStructure($filteredCollection);
    }
}