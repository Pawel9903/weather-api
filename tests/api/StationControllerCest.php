<?php declare(strict_types=1);

use Symfony\Component\HttpFoundation\Response;

/**
 * Class StationControllerCest
 * @package tests\api
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class StationControllerCest
{
    /**
 * @param ApiTester $I
 */
    public function testWhenSendRequestStationSelectGetSelectData(ApiTester $I): void
    {
        $I->haveHttpHeader('content-type', 'application/json');
        $I->sendGET('/stations/select');
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(Response::HTTP_OK);
    }

    /**
     * @param ApiTester $I
     */
    public function testWhenSendRequestStationSelectWithFilterGetFilteredSelectData(ApiTester $I): void
    {
        $I->haveHttpHeader('content-type', 'application/json');
        $I->sendGET('/stations/select', ['filter' => ['city' => 'Legnica']]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(Response::HTTP_OK);
    }

    /**
     * @param ApiTester $I
     */
    public function testWhenSendRequestStationsGetCollection(ApiTester $I): void
    {
        $I->haveHttpHeader('content-type', 'application/json');
        $I->sendGET('/stations/');
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(Response::HTTP_OK);
    }

    /**
     * @param ApiTester $I
     */
    public function testWhenSendRequestWithStationIdArrayGetFilteredCollection(ApiTester $I): void
    {
        $I->haveHttpHeader('content-type', 'application/json');
        $I->sendGET('/stations/', ['filter' => ['id' => [114, 117, 129]]]);
        $I->seeResponseIsJson();
        $I->seeResponseCodeIs(Response::HTTP_OK);
    }
}