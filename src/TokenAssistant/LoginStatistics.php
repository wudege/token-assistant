<?php
/**
 * @filename LoginStatistics.php
 * @touch    09/11/2016 16:28
 * @author   Davis <daviszeng@outlook.com>
 * @version  1.0.0
 */

namespace TokenAssistant;


use Predis\Client;

class LoginStatistics implements LoginStatisticsInterface
{
    const USER_STAT_SORTED_SET_NAMESPACE = 'user-stat:';

    /**
     * @var Client
     */
    private $redisClient;

    public function __construct(Client $client)
    {
        $this->redisClient = $client;
    }

    /**
     *
     * @author Davis <daviszeng@outlook.com>
     *
     * @param int $startTimestamp
     * @param int $endTimestamp
     *
     * @return int
     */
    public function countUsers($startTimestamp, $endTimestamp)
    {
        return $this->redisClient->zcount(static::USER_STAT_SORTED_SET_NAMESPACE, $startTimestamp, $endTimestamp);
    }

    /**
     *
     * @author Davis <daviszeng@outlook.com>
     *
     * @param string $userId
     * @param int    $timestamp
     *
     * @return bool
     */
    public function refresh($userId, $timestamp)
    {
        $this->redisClient->zadd(static::USER_STAT_SORTED_SET_NAMESPACE, array($userId => $timestamp));

        return true;
    }
}