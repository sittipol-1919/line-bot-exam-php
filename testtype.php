<?php
require "vendor/autoload.php";
$access_token = 'AR/mEPCWEHjTgehJg+nVhqHH1tJYFqJsALpuKDorswwCIq4LtAek9ym9QSwXJoMO1IuhZlHnnxBSO7iMI+BhN9wpLJxk6/NP7YhQPqkqerIoG+J+6mmDXMifGC512Yxw7V5ADVASfsW4aTU6qUOg4wdB04t89/1O/w1cDnyilFU=';
$channelSecret = '66766a0d5943074c5579539cce64a416';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
// Loop through each event
foreach ($events['events'] as $event) {
// Reply only when message sent is in 'text' format
if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
// Get text sent
$text = $event['source']['userId'];
// Get replyToken
$replyToken = $event['replyToken'];
// Build message to reply back
$messages = [
'type' => 'text',
'text' => $text
];

$idPush = $text;
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($idPush, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>
