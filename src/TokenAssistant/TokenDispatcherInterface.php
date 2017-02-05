<?php

/**
 * @filename TokenDispatcherInterface.php
 * @touch    09/11/2016 11:21
 * @author   wudege <hi@wudege.me>
 * @version  1.0.0
 */

namespace TokenAssistant;

interface TokenDispatcherInterface
{
    /**
     * Assign a new token or gain existed token.
     * @author wudege <hi@wudege.me>
     *
     * @param string $userId
     * @param bool   $forceRefresh
     *
     * @return string
     */
    public function assign($userId, $forceRefresh = true);

    /**
     * Recycle token if exist.
     * @author wudege <hi@wudege.me>
     *
     * @param string $userId
     *
     * @return bool
     */
    public function recycle($userId);

    /**
     * Get user id from token.
     * @author wudege <hi@wudege.me>
     *
     * @param string $token
     *
     * @return string
     */
    public function getUserIdByToken($token);

    /**
     *
     * @author wudege <hi@wudege.me>
     *
     * @param string $userId
     *
     * @return string
     */
    public function getTokenByUserId($userId);

}
