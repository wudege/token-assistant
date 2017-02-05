<?php
/**
 * @filename Util.php
 * @touch    09/11/2016 14:20
 * @author   wudege <hi@wudege.me>
 * @version  1.0.0
 */

namespace TokenAssistant;


final class Util
{
    /**
     * Generate new token string
     * @author wudege <hi@wudege.me>
     * @return string
     */
    public static function genToken()
    {
        return sha1(uniqid(mt_rand(), true));
    }
}