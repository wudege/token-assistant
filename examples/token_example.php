<?php
/**
 * @filename token_example.php
 * @touch    09/11/2016 21:39
 * @author   wudege <hi@wudege.me>
 * @version  1.0.0
 */

require __DIR__ . '/vendor/autoload.php';

$config = array(
    'host'     => '127.0.0.1',
    'port'     => 6379,
    'database' => 0,
);

$client     = new \Predis\Client($config);
$dispatcher = new \TokenAssistant\TokenDispatcher($client);
$token      = $dispatcher->assign(111);
die($token);