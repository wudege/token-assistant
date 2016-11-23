<?php
/**
 * @filename TokenDispatcher.php
 * @touch    09/11/2016 11:29
 * @author   Davis <daviszeng@outlook.com>
 * @version  1.0.0
 */

namespace TokenAssistant;

use Predis\Client;

class TokenDispatcher implements TokenDispatcherInterface
{
    const TOKEN_HASH_NAMESPACE   = 'token:';
    const USER_ID_HASH_NAMESPACE = 'user-id:';

    /**
     * @var Client
     */
    private $redisClient;

    /**
     * TokenDispatcher constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->redisClient = $client;
    }

    /**
     * Assign a new token or gain existed token.
     * @author Davis <daviszeng@outlook.com>
     *
     * @param string $userId
     * @param bool   $forceRefresh
     *
     * @return string
     */
    public function assign($userId, $forceRefresh = true)
    {
        $token = $this->getTokenByUserId($userId);
        if ($token && $forceRefresh) {
            $this->redisClient->hdel(static::TOKEN_HASH_NAMESPACE, $token);
        }
        $token = $token ? $token : Util::genToken();
        $this->redisClient->hset(static::TOKEN_HASH_NAMESPACE, $token, $userId);
        $this->redisClient->hset(static::USER_ID_HASH_NAMESPACE, $userId, $token);

        return $token;
    }

    /**
     * Recycle token if exist.
     * @author Davis <daviszeng@outlook.com>
     *
     * @param string $userId
     *
     * @return bool
     */
    public function recycle($userId)
    {
        $token = $this->getTokenByUserId($userId);
        if ($token) {
            $this->redisClient->hdel(static::TOKEN_HASH_NAMESPACE, $token);
        }
        $this->redisClient->hdel(static::USER_ID_HASH_NAMESPACE, $userId);

        return true;
    }

    /**
     * Recycle the old token if exist, then assign new token.
     * @author Davis <daviszeng@outlook.com>
     *
     * @param $userId
     *
     * @return string
     */
    public function reassign($userId)
    {
        $this->recycle($userId);

        return $this->assign($userId);
    }

    /**
     * Get user id from token.
     * @author Davis <daviszeng@outlook.com>
     *
     * @param string $token
     *
     * @return string
     */
    public function getUserIdByToken($token)
    {
        return $this->redisClient->hget(static::TOKEN_HASH_NAMESPACE, $token);
    }

    /**
     *
     * @author Davis <daviszeng@outlook.com>
     *
     * @param string $userId
     *
     * @return string
     */
    public function getTokenByUserId($userId)
    {
        return $this->redisClient->hget(static::USER_ID_HASH_NAMESPACE, $userId);
    }
}