<?php
/**
 * @filename LoginStatisticsInterface.php
 * @touch    09/11/2016 15:14
 * @author   wudege <hi@wudege.me>
 * @version  1.0.0
 */

namespace TokenAssistant;


interface LoginStatisticsInterface
{
    /**
     *
     * @author wudege <hi@wudege.me>
     *
     * @param int $startTimestamp
     * @param int $endTimestamp
     *
     * @return int
     */
    public function countUsers($startTimestamp, $endTimestamp);

    /**
     *
     * @author wudege <hi@wudege.me>
     *
     * @param string $userId
     * @param int    $timestamp
     *
     * @return bool
     */
    public function refresh($userId, $timestamp);
}