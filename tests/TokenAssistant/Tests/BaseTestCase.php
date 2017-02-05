<?php
/**
 * @filename BaseTestCase.php
 * @touch    09/11/2016 21:22
 * @author   wudege <hi@wudege.me>
 * @version  1.0.0
 */

namespace TokenAssistant\Tests;

use Predis\Client;
use TokenAssistant\TokenDispatcher;

abstract class BaseTestCase extends \PHPUnit_Framework_TestCase
{
    const TEST_USER_ID = 1000;

    /**
     * @var array
     */
    protected $config = array();

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var TokenDispatcher
     */
    protected $dispatcher;

    /**
     *
     * @author wudege <hi@wudege.me>
     */
    public function setUp()
    {
        $this->config     = array(
            'host'     => getenv('REDIS_HOST'),
            'port'     => getenv('REDIS_PORT'),
            'database' => getenv('REDIS_DB'),
        );
        $this->client     = new Client($this->config);
        $this->dispatcher = new TokenDispatcher($this->client);
    }

    /**
     *
     * @author wudege <hi@wudege.me>
     */
    public function tearDown()
    {
        $this->client->disconnect();
        unset($this->client);
        unset($this->dispatcher);
    }
}