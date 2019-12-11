<?php declare(strict_types=1);

namespace tests\unit;

use App\Weather\Curl\StationCurl;
use Codeception\Test\Unit;
use Curl\Curl;
use UnitTester;

/**
 * Class StationCurlTest
 * @package tests\unit
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class StationCurlTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected UnitTester $tester;

    /**
     * @var StationCurl
     */
    private StationCurl $stationCurl;

    protected function _before()
    {
        $curl = new Curl();
        $this->stationCurl = new StationCurl($curl);
    }

    protected function _after()
    {
    }

    /**
     * @return void
     */
    public function testWhenCallStationsMethodGetStationCollection(): void
    {
        $result = $this->stationCurl->stations();

        $this->tester->assertIsString($result);
    }
}