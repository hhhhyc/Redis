<?php
/**
 * redis 监听
 */
$redis=new Redis();
$redis->connect('127.0.0.1',6379);

//设置监听渠道
//参数1->数组 参数2->回调(参数1：redis实例化 参数2：监听渠道 参数3：监听内容 )
echo "reding c2.c3...\n";
//超时控制
$redis->setOption(Redis::OPT_READ_TIMEOUT,-1);
$redis->subscribe(['c2','c3'],function (Redis $instance,$channel,$message){
    echo "recieve message from{$channel}:{$message}\n";
});