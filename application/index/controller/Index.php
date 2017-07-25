<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        //1，将timestamp,nonce,token按字典序排序
        $nonce = $_GET['nonce'];
        $timestamp = $_GET['timestamp'];
        $signature = $_GET['signature'];
        $echostr = $_GET['echostr'];
        $token = 'wangzaixiaotiao';
        $source = array($token,$timestamp,$nonce);

        //2,将排序后的三个参数拼接后使用sha1加密
        sort($source);
        $checkSignature = sha1(implode('',$source));
        //3，将加密后的字符串与signature进行对比，判断该请求是否来自微信
        if($checkSignature == $signature){
            echo $echostr;exit();
        }
    }
}
