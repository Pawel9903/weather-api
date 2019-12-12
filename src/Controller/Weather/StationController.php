<?php declare(strict_types=1);

namespace App\Controller\Weather;

use App\Weather\Handler\StationHandler;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class StationController
 * @package App\Controller\Weather
 * @author Pawel Ged <pawelged9903@gmail.com>
 * @Rest\Route("/stations", name="stations_")
 */
class StationController extends AbstractFOSRestController
{
    /**
     * @var StationHandler
     */
    private StationHandler $handler;

    /**
     * StationController constructor.
     * @param StationHandler $handler
     */
    public function __construct(StationHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @Rest\Get(path="/select", name="select")
     */
    public function select(Request $request): JsonResponse
    {
        return new JsonResponse($this->handler->handle($request)->select(), Response::HTTP_OK);
    }
}