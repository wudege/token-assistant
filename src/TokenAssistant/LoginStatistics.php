<?php
/**
 * @filename LoginStatistics.php
 * @touch    09/11/2016 16:28
 * @author   wudege <hi@wudege.me>
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
     * @author wudege <hi@wudege.me>
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
     * @author wudege <hi@wudege.me>
     *
     * @param $startTimestamp
     * @param $endTimestamp
     *
     * @return array
     */
    public function listUsers($startTimestamp, $endTimestamp)
    {
        return $this->redisClient->zrevrangebyscore(static::USER_STAT_SORTED_SET_NAMESPACE, $endTimestamp, $startTimestamp);
    }

    /**
     *
     * @author wudege <hi@wudege.me>
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

    /**
     *
     * @author wudege <hi@wudege.me>
     *
     * @param $userId
     *
     * @return string
     */
    public function lastVisited($userId)
    {
        return $this->redisClient->zscore(static::USER_STAT_SORTED_SET_NAMESPACE, $userId);
    }
}