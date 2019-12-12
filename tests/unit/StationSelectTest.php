<?php declare(strict_types=1);

namespace tests\unit;

use App\Core\Transformer\Address\CityTransformer;
use App\Core\Transformer\Address\CommuneTransformer;
use App\Core\Transformer\GeoJson\GeoJsonTransformer;
use App\Core\Transformer\GeoJson\GeometryTransformer;
use App\Weather\Curl\StationCurl;
use App\Weather\Dao\StationDaoCollection;
use App\Weather\Dao\Select\StationSelect;
use App\Weather\Transformer\Station\StationTransformer;
use Codeception\Test\Unit;
use Mockery;
use Symfony\Component\HttpFoundation\Request;
use UnitTester;

/**
 * Class StationSelectTest
 * @package tests\unit
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
class StationSelectTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected UnitTester $tester;

    /**
     * @var StationCurl|Mockery\LegacyMockInterface|Mockery\MockInterface
     */
    private StationCurl $curl;

    /**
     * @var StationDaoCollection
     */
    private StationDaoCollection $dao;

    /**
     * @var StationSelect
     */
    private StationSelect $select;

    /**
     * @var Mockery\LegacyMockInterface|Mockery\MockInterface|Request
     */
    private Request $request;

    /**
     * @throws \Exception
     */
    protected function _before()
    {
        $this->curl = Mockery::mock(StationCurl::class);
        $this->request = Mockery::mock(Request::class);
        $this->dao = new StationDaoCollection(new StationTransformer(new GeoJsonTransformer(new GeometryTransformer()), new CityTransformer(new CommuneTransformer())), $this->curl);
        $this->select = new StationSelect($this->dao);

    }

    protected function _after()
    {
        Mockery::close();
    }

    /**
     * @return void
     */
    public function testWhenCallStationsSelectDataMethodGetFilteredSelectDataCollection(): void
    {
        $this->curl
            ->shouldReceive('stations')
            ->withNoArgs()
            ->once()
            ->andReturn($this->mockWeatherApiArray());

        $this->request
            ->shouldReceive('get')
            ->with('filter')
            ->once()
            ->andReturn(['city' => 'Wrocław']);

        $this->select->setRequest($this->request);
        $result = $this->select->getResponse();

        $data = $result['data'];

        $this->assertIsArray($result);
        $this->assertCount(1, $data);
        $this->assertArrayHasKey('value', reset($data));
    }

    /**
     * @return void
     */
    public function testWhenCallStationsSelectDataMethodWithBadFilterKeyEmptyArrayGetEmptyArray(): void
    {
        $this->curl
            ->shouldReceive('stations')
            ->withNoArgs()
            ->once()
            ->andReturn([]);

        $this->request
            ->shouldReceive('get')
            ->with('filter')
            ->once()
            ->andReturn(['city' => 'example']);

        $this->select->setRequest($this->request);
        $result = $this->select->getResponse();

        $data = $result['data'];

        $this->assertIsArray($result);
        $this->assertEmpty($data);
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
                    'stationName' => 'Poznań - Korzeniowskiego',
                    'gegrLat' => '51.129378',
                    'gegrLon' => '17.029250',
                    'city' =>
                        array (
                            'id' => 1064,
                            'name' => 'Poznań',
                            'commune' =>
                                array (
                                    'communeName' => 'Poznań',
                                    'districtName' => 'Poznań',
                                    'provinceName' => 'WIELKOPOLSKIE',
                                ),
                        ),
                    'addressStreet' => 'ul. Wyb. J.Conrada-Korzeniowskiego 18',
                ),
        );
    }
}