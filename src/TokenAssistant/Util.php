<?php
/**
 * @filename Util.php
 * @touch    09/11/2016 14:20
 * @author   Davis <daviszeng@outlook.com>
 * @version  1.0.0
 */

namespace TokenAssistant;


final class Util
{
    /**
     * Generate new token string
     * @author Davis <daviszeng@outlook.com>
     * @return string
     */
    public static function genToken()
    {
        return sha1(uniqid(mt_rand(), true));
    }
}