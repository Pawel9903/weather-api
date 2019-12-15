<?php declare(strict_types=1);

namespace App\Controller\Weather;

use App\Weather\Handler\AirQualityHandler;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class AirQualityController
 * @package App\Controller\Weather
 * @author Pawel Ged <pawelged9903@gmail.com>
 * @Rest\Route("/stations/{id}", name="stations_air_quality_")
 */
class AirQualityController extends AbstractFOSRestController
{
    /**
     * @param Request $request
     * @param AirQualityHandler $handler
     * @return View
     * @Rest\Get(path="/air-quality/", name="one")
     * @Serializer\Groups({"min"})
     * @throws \Exception
     */
    public function airQuality(Request $request, AirQualityHandler $handler): View
    {
        return $this->view($handler->handle($request)->getAirQuality((int)$request->get('id')), Response::HTTP_OK);
    }
}