<?php

/**
 * @filename TokenDispatcherTest.php
 * @touch    09/11/2016 17:05
 * @author   wudege <hi@wudege.me>
 * @version  1.0.0
 */

namespace TokenAssistant\Tests;

class TokenDispatcherTest extends BaseTestCase
{
    /**
     *
     * @author wudege <hi@wudege.me>
     */
    public function testAssign()
    {
        $token = $this->dispatcher->assign(self::TEST_USER_ID);
        $this->assertNotEmpty($token);
    }

    /**
     *
     * @author wudege <hi@wudege.me>
     */
    public function testReassign()
    {
        $token    = $this->dispatcher->assign(self::TEST_USER_ID);
        $newToken = $this->dispatcher->reassign(self::TEST_USER_ID);
        $this->assertNotEquals($token, $newToken);
    }

    /**
     *
     * @author  wudege <hi@wudege.me>
     * @depends testAssign
     */
    public function testGetTokenByUserId()
    {
        $token = $this->dispatcher->getTokenByUserId(self::TEST_USER_ID);
        $this->assertNotEmpty($token);
    }

    /**
     *
     * @author  wudege <hi@wudege.me>
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
     * @author wudege <hi@wudege.me>
     */
    public function testRecycle()
    {
        $this->dispatcher->recycle(self::TEST_USER_ID);
        $token = $this->dispatcher->getTokenByUserId(self::TEST_USER_ID);
        $this->assertEmpty($token);
    }


}
