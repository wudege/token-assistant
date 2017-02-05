<?php
/**
 * @filename UtilTest.php
 * @touch    09/11/2016 21:09
 * @author   wudege <hi@wudege.me>
 * @version  1.0.0
 */

namespace TokenAssistant\Tests;


use TokenAssistant\Util;

class UtilTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     * @author wudege <hi@wudege.me>
     */
    public function testGenToken()
    {
        $token = Util::genToken();
        $this->assertNotEmpty($token);
    }
}