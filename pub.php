<?php
/**
 * redis 发布者
 */
$redis=new Redis();
$redis->connect('127.0.0.1',6379);

$res=$redis->publish('c1','111');
echo "clients reading c1:{$res}\n";

$res=$redis->publish('c2','111');
echo "clients reading c2:{$res}\n";

$res=$redis->publish('c3','111');
echo "clients reading c3:{$res}\n";