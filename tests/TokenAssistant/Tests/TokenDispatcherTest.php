<?php

/**
 * @filename TokenDispatcherTest.php
 * @touch    09/11/2016 17:05
 * @author   Davis <daviszeng@outlook.com>
 * @version  1.0.0
 */

namespace TokenAssistant\Tests;

class TokenDispatcherTest extends BaseTestCase
{
    /**
     *
     * @author Davis <daviszeng@outlook.com>
     */
    public function testAssign()
    {
        $token = $this->dispatcher->assign(self::TEST_USER_ID);
        $this->assertNotEmpty($token);
    }

    /**
     *
     * @author  Davis <daviszeng@outlook.com>
     * @depends testAssign
     */
    public function testGetTokenByUserId()
    {
        $token = $this->dispatcher->getTokenByUserId(self::TEST_USER_ID);
        $this->assertNotEmpty($token);
    }

    /**
     *
     * @author  Davis <daviszeng@outlook.com>
     * @depends testAssign
     */
    public function testGetUserIdByToken()
    {
        $token  = $this->dispatcher->getTokenByUserId(self::TEST_USER_ID);
        $userId = $this->dispatcher->getUserIdByToken($token);
        $this->assertEquals((int)$userId, self::TEST_USER_ID);
    }

    /**
     *
     * @author Davis <daviszeng@outlook.com>
     */
    public function testRecycle()
    {
        $this->dispatcher->recycle(self::TEST_USER_ID);
        $token = $this->dispatcher->getTokenByUserId(self::TEST_USER_ID);
        $this->assertEmpty($token);
    }


}
