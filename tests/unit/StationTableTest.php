<?php declare(strict_types=1);

namespace tests\unit;

use App\Core\Transformer\Address\CityTransformer;
use App\Core\Transformer\Address\CommuneTransformer;
use App\Core\Transformer\GeoJson\GeoJsonTransformer;
use App\Core\Transformer\GeoJson\GeometryTransformer;
use App\Weather\Curl\StationCurl;
use App\Weather\Dao\StationDao;
use App\Weather\Dao\Table\StationTable;
use App\Weather\Model\Station\Station;
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
class StationTableTest extends Unit
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
     * @var StationDao
     */
    private StationDao $dao;

    /**
     * @var Mockery\LegacyMockInterface|Mockery\MockInterface|Request
     */
    private Request $request;

    /**
     * @var StationTable
     */
    private StationTable $table;

    /**
     * @throws \Exception
     */
    protected function _before()
    {
        $this->curl = Mockery::mock(StationCurl::class);
        $this->request = Mockery::mock(Request::class);
        $this->dao = new StationDao(new StationTransformer(new GeoJsonTransformer(new GeometryTransformer()), new CityTransformer(new CommuneTransformer())), $this->curl);
        $this->table = new StationTable($this->dao);
    }

    protected function _after()
    {
        Mockery::close();
    }

    /**
     * @return void
     */
    public function testWhenCallStationsTableDataMethodGetFilteredTableDataCollection(): void
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

        $this->table->setRequest($this->request);
        $result = $this->table->getResponse();

        $data = $result['data'];

        $this->assertIsArray($result);
        $this->assertInstanceOf(Station::class, reset($data));
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