<?php

require '..' . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
use Kiwari\Model\Button;
use Kiwari\Model\Card;
use Kiwari\Model\Carousel;




$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$bot = new \Kiwari\Kiwari(getenv('ACCESS_TOKEN'));
$bot->enableLog(true);
$bot->run();

$sender = $bot->getSender();
$room = $bot->getChatRoom();
$message = $bot->getMessage();

// $path = '/Users/andhikayuana/Downloads/wav_wav_wavv.mp3';
// $uploadedFile = $bot->upload($path);
$fileUrl = 'https://d1edrlpyc25xu0.cloudfront.net/kiwari-prod/raw/upload/iaczqmgLLJ/wav_wav_wavv.mp3';
$text = 'halo bro, ini dari kiwari bot sdk php';

$label = 'Goku';
$payload =  [
            "url"=> "https://www.google.com/search?q=goku",
            "method"=> "get",
            "payload"=> null
            ];

$btn = Button::create()
            ->setLabel($label)
            ->setMethod(Button::METHOD_POST)
            ->setType(Button::TYPE_LINK)
            ->setPayload($payload);

$label2 = 'Yamcha';
$payload2 =  [
            "url"=> "https://www.google.com/search?q=yamcha",
            "method"=> "get",
            "payload"=> null
            ];

$btn2 = Button::create()
            ->setLabel($label2)
            ->setMethod(Button::METHOD_GET)
            ->setType(Button::TYPE_LINK)
            ->setPayload($payload2);

//     "text" => "Pilih sesuatu ? hmm...",
$image = "https://content.halocdn.com/media/Default/games/halo-5-guardians/page/h5-guardians-facebook-1200x630-ba103624b3f34af79fe8cb2d340dce3f.jpg";
$title = "May Spaghetti be with Jarjit";
//     "description" => "Oleh sippnshop\n96% (666 feedback)\nRp 49.000.00,-\nBUY 2 GET 1 FREE!!!",
$url = "http://www.yahoo.com";

$card = Card::create()
            ->setText($title)
            ->setImage($image)
            ->setTitle($title)
            ->setDescription($text)
            ->setUrl($url);



// $res = $bot->sendButton($room['qiscus_room_id'], $text, [$btn, $btn2]);
$res = $bot->sendCard($room['qiscus_room_id'],$text, $card, [$btn, $btn2]);
// $res = $bot->sendCarousel($room['qiscus_room_id']);
// $res = $bot->sendCustom($room['qiscus_room_id']);
// $res = $bot->sendDocument($room['qiscus_room_id'], $fileUrl);
// $res = $bot->sendImage($room['qiscus_room_id']);
// $res = $bot->sendLocation($room['qiscus_room_id']);
// $res = $bot->sendReply($room['qiscus_room_id']);
// $res = $bot->sendText($room['qiscus_room_ids'], $text);

// $bot->sendButton($roomId, 'teksnya', [$btn. $btn1])



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

// $res = $bot->sendButton($room['qiscus_room_id']);
// $res = $bot->sendCard($room['qiscus_room_id']);
// $res = $bot->sendCarousel($room['qiscus_room_id']);
// $res = $bot->sendCustom($room['qiscus_room_id']);
// $res = $bot->sendDocument($room['qiscus_room_id'], $fileUrl);
// $res = $bot->sendImage($room['qiscus_room_id']);
// $res = $bot->sendLocation($room['qiscus_room_id']);
// $res = $bot->sendReply($room['qiscus_room_id']);
// $res = $bot->sendText($room['qiscus_room_ids'], $text);