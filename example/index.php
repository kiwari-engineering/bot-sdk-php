<?php

require '..' . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$bot = new \Kiwari\Kiwari(getenv('ACCESS_TOKEN'));
$bot->enableLog(true);

echo $bot->getAccessToken();

$bot->run();

$room = $bot->getChatRoom();

$bot->sendText($room['qiscus_room_id'], 'halo bro, ini dari kiwari bot sdk php');

var_dump($bot->getSender());
var_dump($bot->getMyAccount());
var_dump($bot->getChatRoom());
var_dump($bot->getMessage());

echo \Kiwari\Util\Url::BASE_URL;
echo \Kiwari\Util\Url::API_V1;
echo \Kiwari\Util\Url::POST_MESSAGE;


/**
 *  - inisiasi: access_token
 *  - register webhook: pasang di dashboard
 *  - provide send[MessageType]
 */