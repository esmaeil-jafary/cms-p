<?php
//برای مشخص نمودن کاربران آنلاین
session_start();
class OnlineUser extends DB
{
    public function getOnlineUser(){
//        ابتدا سیشن آیدی را باید بدست بیاوریم
$SessionId=session_id();
$Time=time();
$cn=$this->connect();
//میگوییم آنهایی که سشن آنها وجود دارد زمانش را آبدیت کن و آنهایی که اولین بارشان است سیشن و زمان را باهم ثبت کن
$CurrentUsers=$cn->query("select * from Online_User where Session=$SessionId")->fetchAll(PDO::FETCH_ASSOC);
//یعنی قبلا سشن آن اضافه شده بود
if (count($CurrentUsers)>0){
$cn->query("update Online_User set Time=$Time where Session=$SessionId");
}
//اگر بار اول بود که وارد میشئ
        else{
//first time
            $cn->query("insert into Online_User(Session,Time) values ($SessionId,$Time)");
        }
//       قبل  شصت ثانیه آنلاین حساب نمی شوند و بعد از آن انلاین حساب می شوند
        $TimeOffset=60;
        $OfflineTime=$Time-$TimeOffset;
        return $cn->query("select count(id) as cnt from Online_User where Time>$OfflineTime")[0]["cnt"];

    }

}