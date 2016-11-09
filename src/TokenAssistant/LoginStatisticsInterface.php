<?php
/**
 * @filename LoginStatisticsInterface.php
 * @touch    09/11/2016 15:14
 * @author   Davis <daviszeng@outlook.com>
 * @version  1.0.0
 */

namespace TokenAssistant;


interface LoginStatisticsInterface
{
    /**
     *
     * @author Davis <daviszeng@outlook.com>
     *
     * @param int $startTimestamp
     * @param int $endTimestamp
     *
     * @return int
     */
    public function countUsers($startTimestamp, $endTimestamp);

    /**
     *
     * @author Davis <daviszeng@outlook.com>
     *
     * @param string $userId
     * @param int    $timestamp
     *
     * @return bool
     */
    public function refresh($userId, $timestamp);
}