<?php

require '..' . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$bot = new \Kiwari\Kiwari(getenv('ACCESS_TOKEN'));
$bot->enableLog(true);

echo $bot->getAccessToken();

echo \Kiwari\Kiwari::ENGINE_URL;

$bot->handleIncomingMessage();

var_dump($bot->getSender());
var_dump($bot->getMyAccount());
var_dump($bot->getChatRoom());
var_dump($bot->getMessage());

/**
 *  - inisiasi: access_token
 *  - register webhook: pasang di dashboard
 *  - provide send[MessageType]
 */