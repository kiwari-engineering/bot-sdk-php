<?php

require '..' . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$bot = new \Kiwari\Kiwari(getenv('ACCESS_TOKEN'));
$bot->enableLog(true);

echo $bot->getAccessToken();

$bot->run();

$room = $bot->getChatRoom();

// $bot->sendText($room['qiscus_room_ids'], 'halo bro, ini dari kiwari bot sdk php');

// $path = '/Users/andhikayuana/Downloads/wav_wav_wavv.mp3';
// $uploadedFile = $bot->upload($path);
$fileUrl = 'https://d1edrlpyc25xu0.cloudfront.net/kiwari-prod/raw/upload/iaczqmgLLJ/wav_wav_wavv.mp3';
$message = "monggo pencet ini";
$buttons = [
            array (
                "label"=> "button1",
                "type"=> "postback",
                "payload"=> array (
                    "url"=> "http://www.google.com",
                )
            ),
            array (
                "label"=> "button2",
                "type"=> "postback",
                "payload"=> array (
                    "url"=> "http://www.google.com",
                )
            )
        ];

// $res = $bot->sendDocument($room['qiscus_room_id'], $fileUrl);
// $res = $bot->sendButton($message, $buttons);
$res = $bot->sendCard($room['qiscus_room_id']);

var_dump($res);
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