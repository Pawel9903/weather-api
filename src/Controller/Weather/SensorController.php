<?php declare(strict_types=1);

namespace App\Controller\Weather;

use App\Weather\Handler\SensorHandler;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class SensorController
 * @package App\Controller\Weather
 * @author Pawel Ged <pawelged9903@gmail.com>
 * @Rest\Route("/stations/{id}", name="stations_sensors_")
 */
class SensorController extends AbstractFOSRestController
{
    /**
     * @param Request $request
     * @param SensorHandler $handler
     * @return View
     * @Rest\Get(path="/sensors/", name="list")
     * @Serializer\Groups({"min"})
     */
    public function sensors(Request $request, SensorHandler $handler): View
    {
        return $this->view($handler->handle($request)->collection(), Response::HTTP_OK);
    }
}