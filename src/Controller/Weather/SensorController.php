<?php declare(strict_types=1);

namespace App\Controller\Weather;

use App\Weather\Handler\SensorHandler;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SensorController
 * @package App\Controller\Weather
 * @author Pawel Ged <pawelged9903@gmail.com>
 * @Rest\Route("/stations/{id}/sensors", name="sensors_")
 */
class SensorController extends AbstractFOSRestController
{
    /**
     * @param Request $request
     * @param SensorHandler $handler
     * @return JsonResponse
     * @Rest\Get(path="/", name="list")
     */
    public function sensors(Request $request, SensorHandler $handler): JsonResponse
    {
        return new JsonResponse($handler->handle($request)->collection((int)$request->get('id')), Response::HTTP_OK);
    }
}