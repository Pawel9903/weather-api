<?php declare(strict_types=1);

namespace App\Controller\Weather;

use App\Weather\Handler\StationHandler;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class StationController
 * @package App\Controller\Weather
 * @author Pawel Ged <pawelged9903@gmail.com>
 * @Rest\Route("/stations", name="stations_")
 */
class StationController extends AbstractFOSRestController
{
    /**
     * @param Request $request
     * @param StationHandler $handler
     * @return View
     * @Rest\Get(path="/", name="list")
     * @Serializer\Groups({"min"})
     */
    public function stations(Request $request, StationHandler $handler): View
    {
        return $this->view($handler->handle($request)->collection(), Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @param StationHandler $handler
     * @return View
     * @Rest\Get(path="/select/", name="select")
     */
    public function select(Request $request, StationHandler $handler): View
    {
        return $this->view($handler->handle($request)->select(), Response::HTTP_OK);
    }
}