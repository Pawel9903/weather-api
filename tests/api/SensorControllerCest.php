<?php declare(strict_types=1);

use Symfony\Component\HttpFoundation\Response;

/**
 * Class SensorControllerCest
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class SensorControllerCest
{
    /**
 * @param ApiTester $I
 */
    public function testWhenSendRequestSensorsGetTableData(ApiTester $I): void
    {
        $I->haveHttpHeader('content-type', 'application/json');
        $I->sendGET("/stations/117/sensors/");
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(Response::HTTP_OK);
    }
}