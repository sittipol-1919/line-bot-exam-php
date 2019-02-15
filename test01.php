<?php 
require "vendor/autoload.php";
$access_token = 'AR/mEPCWEHjTgehJg+nVhqHH1tJYFqJsALpuKDorswwCIq4LtAek9ym9QSwXJoMO1IuhZlHnnxBSO7iMI+BhN9wpLJxk6/NP7YhQPqkqerIoG+J+6mmDXMifGC512Yxw7V5ADVASfsW4aTU6qUOg4wdB04t89/1O/w1cDnyilFU=';
$channelSecret = '66766a0d5943074c5579539cce64a416';
$idPush = 'Uf8d583d3729b126c1755461eb6a76dd';
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($idPush, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>
