<?php

require '..' . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$bot = new \Kiwari\Kiwari(getenv('ACCESS_TOKEN'));
$bot->enableLog(true);
$bot->run();

$sender = $bot->getSender();
$room = $bot->getChatRoom();
$message = $bot->getMessage();

$bot->sendText($room['qiscus_room_id'], 'halo bro, ini dari kiwari bot sdk php');
// $bot->sendText(829055, 'hai');

$path = '/Users/andhikayuana/Downloads/wav_wav_wavv.mp3';
$uploadedFile = $bot->upload($path);
var_dump($uploadedFile->body->data->url);
// $fileUrl = 'https://d1edrlpyc25xu0.cloudfront.net/kiwari-prod/raw/upload/iaczqmgLLJ/wav_wav_wavv.mp3';
$res = $bot->sendDocument($room['qiscus_room_id'], $uploadedFile->body->data->url);
var_dump($res);
$res2 = $bot->sendButton($room['qiscus_room_id'], 'Ini adalah contoh teksnya ya atau bisa jadi deskripsinya', [
    \Kiwari\Model\Button::create()
        ->setLabel('Google')
        ->setUrl('https://google.com'),
    \Kiwari\Model\Button::create()
        ->setLabel('Facebook')
        ->setUrl('https://facebook.com'),
    \Kiwari\Model\Button::create()
        ->setLabel('Twitter')
        ->setUrl('https://twitter.com')
]);

// var_dump($res2);
// var_dump($bot->getSender());
// var_dump($bot->getMyAccount());
// var_dump($bot->getChatRoom());
// var_dump($bot->getMessage());

// echo \Kiwari\Util\Url::BASE_URL;
// echo \Kiwari\Util\Url::API_V1;
// echo \Kiwari\Util\Url::POST_MESSAGE;


/**
 *  - inisiasi: access_token
 *  - register webhook: pasang di dashboard
 *  - provide send[MessageType]
 */