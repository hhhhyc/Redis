<?php
$redis=new Redis();
$redis->connect('127.0.0.1',6379);

//首页pv
$channelpvindex="pv:index";

//列表页pv
$channelpvlist="pv:list";

//内容页pv
$channelpvarticle="pv:article";

//频道和pv的key映射
$keyMap=[
  $channelpvindex=>'realtimepv:index',
    $channelpvlist=>'realtimepv:list',
    $channelpvarticle=>'realtimepv:article',
];


$redis->setOption(Redis::OPT_READ_TIMEOUT,-1);
$redis->subscribe([$channelpvindex,$channelpvlist,$channelpvarticle],function (Redis $instance,$channelname,$message){
//    echo "{$channelname}->{$message}\n";


    //尝试取消订阅(只能执行  (模式)订阅/取消（模式）订阅,)
//    echo "{$channelname}\n";
//    $instance->unsubscribe([$channelname]);
//    return;

//    记录pv
    //重新实例化redis
    $redis2=new Redis();
    $redis2->connect('127.0.0.1',6379);
    global $keyMap;
    if(isset($keyMap[$channelname])){
        $realTimePvKey=$keyMap[$channelname];
        $res = $redis2->incrBy($realTimePvKey,1);
        var_dump($res);
    }
});