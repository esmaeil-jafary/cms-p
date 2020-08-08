<?php
//برای ارسال ناتیفیکیشن
require_once "./vendor/autoload.php";
class Notification
{
public function sendNotification($Data){
    $options = array(
        'cluster' => 'ap2',
        'useTLS' => true
    );
    $pusher = new Pusher\Pusher(
        '8912d94d4b1a867fc87d',
        'aaefb23cf529f2ccca0c',
        '971817',
        $options
    );


    $pusher->trigger('my-channel', 'Register', $Data);
}
}