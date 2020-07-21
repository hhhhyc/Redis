<?php
$redis=new Redis();
$redis->connect('127.0.0.1',6379);

//内容页pv
$channelpvarticle="pv:article";

//内容页时间浏览超过5s
$channelGT5='gt5:article';


$redis->setOption(Redis::OPT_READ_TIMEOUT,-1);
$redis->subscribe([$channelpvarticle,$channelGT5],function (Redis $instance,$channelName,$message){
    $redis2=new Redis();
    $redis2->connect('127.0.0.1',6379);
    if('gt5:article'==$channelName){
        echo "{$channelName}\n";
        $key="realtimescore:".intval($message);
        $res = $redis2->hIncrBy($key,'gt5',1);
        echo "{$res}\n";
        if($res){
            $score = $res*6;
            $redis2->hSet($key,'score',$score);
            echo "{$score}\n";
        }
        else{
            //警告
        }
    }
});
