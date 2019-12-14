<?php declare(strict_types=1);

namespace App\Core\Dao\DaoCollectionParam;

/**
 * Interface ParamElement
 * @package App\Core\Dao\DaoCollectionParam
 */
interface ParamElement
{
    /**
     * @param string $key
     * @return mixed
     */
    public function getParameter(string $key);

    /**
     * @return array
     */
    public function getAll(): array;

    /**
     * @param array $params
     * @return $this
     */
    public function setParams(array $params): self;
}