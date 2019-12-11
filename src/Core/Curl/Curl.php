<?php declare(strict_types=1);

namespace App\Core\Curl;

use \Curl\Curl as CurlService;

/**
 * Class Curl
 * @package App\Core\Curl
 * @author Pawel Ged <pawelged9903@gmail.com>
 */
abstract class Curl
{

    /**
     * @var string
     */
    private string $prefix = '';

    /**
     * @var string
     */
    private string $host = '';

    /**
     * @var CurlService
     */
    protected CurlService $curl;

    /**
     * Curl constructor.
     * @param CurlService $curl
     */
    public function __construct(CurlService $curl)
    {
        $this->curl = $curl;
    }

    /**
     * @param string $urlLastPart
     * @param array $params
     * @return string
     */
    public function get(string $urlLastPart = '', array $params = [])
    {
        $this->curl->get($this->generateUrl($urlLastPart), $params);
        return $this->response();
    }

    /**
     * @return void
     */
    public function reset(): void
    {
        $this->curl->reset();
    }

    /**
     * @return string
     */
    public function response()
    {
        return $this->curl->getResponse();
    }

    /**
     * @param string $host
     * @param string $prefix
     */
    protected function setBasicUrl(string $host, string $prefix): void
    {
        $this->host = $host;
        $this->prefix = $prefix;
    }

    /**
     * @param string $urlLastPart
     * @return string
     */
    private function generateUrl(string $urlLastPart): string
    {
        return "{$this->host}/{$this->prefix}/{$urlLastPart}/";
    }
}