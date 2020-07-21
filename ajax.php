<?php
$action=$_GET['action'];

$redis=new Redis();
$redis->connect('127.0.0.1',6379);

//首页pv
$channelpvindex="pv:index";

//列表页pv
$channelpvlist="pv:list";

//内容页pv
$channelpvarticle="pv:article";

//内容页时间浏览超过5s
$channelGT5='gt5:article';

if('pv'==$action){
    //pv统计
    $from=$_GET['from'];
    if($from=='index'){
        $redis->publish($channelpvindex,1);
    }else if($from=='list'){
        $tid=intval($_GET['tid']);
        $redis->publish($channelpvlist,$tid);
    }
    else if($from=='article'){
        $aid=intval($_GET['aid']);
        $redis->publish($channelpvarticle,$aid);
    }
}
else if('gt5'==$action){
    //浏览时间超过5S
    $aid=intval($_GET['aid']);
    $redis->publish($channelGT5,$aid);
}else{
    //未知

}