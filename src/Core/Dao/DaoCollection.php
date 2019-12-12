<?php declare(strict_types=1);

namespace App\Core\Dao;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class DaoCollection
 * @package App\Core\Dao
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
abstract class DaoCollection
{
    /**
     * @var Request
     */
    protected Request $request;

    /**
     * @var DaoCollectionInterface
     */
    protected DaoCollectionInterface $dao;

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
}