<?php declare(strict_types=1);

namespace App\Core\Handler;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class Handler
 * @package App\Core\Handler
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
abstract class Handler
{

    /**
     * @var Handler|null
     */
    protected ?Handler $successor = null;

    /**
     * Handler constructor.
     */
    public function __construct()
    {
        $this->successor = $this;
    }
    /**
     * This approach by using a template method pattern ensures you that
     * each subclass will not forget to call the successor
     *
     * @param Request $request
     *
     * @return string|null
     */
    public function handle(Request $request)
    {
        $processed = $this->processing($request);
        if ($processed === null) {
            if ($this->successor !== null) {
                $processed = $this->successor->handle($request);
            }
        }
        return $processed;
    }

    /**
     * @param Request|null $request
     * @return mixed
     */
    abstract protected function processing(Request $request = null);
}