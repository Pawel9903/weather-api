<?php declare(strict_types=1);

namespace tests\unit;

use App\Core\Model\GeoJson\GeoJson;
use App\Core\Model\GeoJson\Geometry;
use App\Core\Transformer\Address\CityTransformer;
use App\Core\Transformer\Address\CommuneTransformer;
use App\Core\Transformer\GeoJson\GeoJsonTransformer;
use App\Core\Transformer\GeoJson\GeometryTransformer;
use App\Weather\Curl\WeatherCurl;
use App\Weather\Dao\StationDao;
use App\Weather\Model\Station\Station;
use App\Weather\Transformer\Station\StationTransformer;
use Codeception\Test\Unit;
use Mockery;
use UnitTester;

/**
 * Class StationDaoTest
 * @package tests\unit
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class StationDaoTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected UnitTester $tester;

    /**
     * @var WeatherCurl|Mockery\LegacyMockInterface|Mockery\MockInterface
     */
    private WeatherCurl $curl;

    /**
     * @var StationDao
     */
    private StationDao $dao;

    protected function _before()
    {
        $this->curl = Mockery::mock(WeatherCurl::class);
        $this->dao = new StationDao($this->curl);
    }

    protected function _after()
    {
        Mockery::close();
    }

    /**
     * @return void
     */
    public function testWhenCallStationsMethodWithFullArrayDataGetStationModelCollection(): void
    {
        $this->curl->shouldReceive('stations')->withNoArgs()->once()->andReturn($this->mockWeatherApiArray());

        $result = $this->dao->getData();

        $this->assertIsArray($result);
        $this->assertCount(count($this->mockWeatherApiArray()), $result);
        $this->assertInstanceOf(Station::class, reset($result));
        $this->assertInstanceOf(GeoJson::class, reset($result)->getCoords());
        $this->assertInstanceOf(Geometry::class, reset($result)->getCoords()->getGeometry());
        $this->assertSame((float)$this->mockWeatherApiArray()[0]['gegrLat'], reset($result)->getCoords()->getGeometry()->getLat());
    }

    /**
     * @return void
     */
    public function testWhenCallStationsMethodWithEmptyArrayDataGetEmptyArray(): void
    {
        $this->curl->shouldReceive('stations')->withNoArgs()->once()->andReturn([]);

        $result = $this->dao->getData();

        $this->assertIsArray($result);
        $this->assertEmpty($result);
     }

    /**
     * @return array
     */
    private function mockWeatherApiArray(): array
    {
        return array (
            0 =>
                array (
                    'id' => 114,
                    'stationName' => 'Wrocław - Bartnicza',
                    'gegrLat' => '51.115933',
                    'gegrLon' => '17.141125',
                    'city' =>
                        array (
                            'id' => 1064,
                            'name' => 'Wrocław',
                            'commune' =>
                                array (
                                    'communeName' => 'Wrocław',
                                    'districtName' => 'Wrocław',
                                    'provinceName' => 'DOLNOŚLĄSKIE',
                                ),
                        ),
                    'addressStreet' => 'ul. Bartnicza',
                ),
            1 =>
                array (
                    'id' => 117,
                    'stationName' => 'Wrocław - Korzeniowskiego',
                    'gegrLat' => '51.129378',
                    'gegrLon' => '17.029250',
                    'city' =>
                        array (
                            'id' => 1064,
                            'name' => 'Wrocław',
                            'commune' =>
                                array (
                                    'communeName' => 'Wrocław',
                                    'districtName' => 'Wrocław',
                                    'provinceName' => 'DOLNOŚLĄSKIE',
                                ),
                        ),
                    'addressStreet' => 'ul. Wyb. J.Conrada-Korzeniowskiego 18',
                ),
        );
    }
}