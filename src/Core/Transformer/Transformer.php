<?php declare(strict_types=1);

namespace App\Core\Transformer;

/**
 * Class Transformer
 * @package App\Core\Transformer
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
abstract class Transformer
{
    const INSTANCE = 'INSTANCE';

    /**
     * @param $data
     * @param array $context
     * @return mixed
     */
    abstract public function transform($data, array $context = []);

    /**
     * @param $data
     * @param array $context
     * @throws \Exception
     */
    public function reverseTransform($data, array $context = [])
    {
        throw new \Exception('This method is not defined.');
    }
}