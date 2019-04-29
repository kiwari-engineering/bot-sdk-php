<?php

require '..' . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
use Kiwari\Model\Button;
use Kiwari\Model\Card;
use Kiwari\Model\Carousel;
use Kiwari\Model\Custom;
use Kiwari\Model\Document;
use Kiwari\Model\File;
use Kiwari\Model\Location;
use Kiwari\Model\Reply;
use Kiwari\Model\Text;



$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$bot = new \Kiwari\Kiwari(getenv('ACCESS_TOKEN'));
$bot->enableLog(true);
$bot->run();

$sender = $bot->getSender();
$room = $bot->getChatRoom();
$message = $bot->getMessage();

switch ($message['text']) {
    case '/help':
        # code...
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

        break;

    case '/info':
    
        $res = $bot->sendText($room['qiscus_room_id'], 'ini adalah info');

        break;

    
    case '/score':

        $res = $bot->sendText($room['qiscus_room_id'], 'ini adalah score');

        break;
    
    default:
        # code...
        $bot->sendText($room['qiscus_room_id'], 'Aduh, aku ga ngerti nih :P, tolong ketik /help');
        break;
}

// $bot->sendText($room['qiscus_room_id'], 'halo bro, ini dari kiwari bot sdk php');
// $bot->sendText(829055, 'hai');

// $path = '/Users/andhikayuana/Downloads/wav_wav_wavv.mp3';
// $uploadedFile = $bot->upload($path);
// var_dump($uploadedFile->body->data->url);
// $fileUrl = 'https://d1edrlpyc25xu0.cloudfront.net/kiwari-prod/raw/upload/iaczqmgLLJ/wav_wav_wavv.mp3';
// $res = $bot->sendDocument($room['qiscus_room_id'], $uploadedFile->body->data->url);
// var_dump($res);
// $res2 = $bot->sendButton($room['qiscus_room_id'], 'Ini adalah contoh teksnya ya atau bisa jadi deskripsinya', [
//     \Kiwari\Model\Button::create()
//         ->setLabel('Google')
//         ->setUrl('https://google.com'),
//     \Kiwari\Model\Button::create()
//         ->setLabel('Facebook')
//         ->setUrl('https://facebook.com'),
//     \Kiwari\Model\Button::create()
//         ->setLabel('Twitter')
//         ->setUrl('https://twitter.com')
// ]);

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

// $res = $bot->sendButton($room['qiscus_room_id']);
// $res = $bot->sendCard($room['qiscus_room_id']);
// $res = $bot->sendCarousel($room['qiscus_room_id']);
// $res = $bot->sendCustom($room['qiscus_room_id']);
// $res = $bot->sendDocument($room['qiscus_room_id'], $fileUrl);
// $res = $bot->sendImage($room['qiscus_room_id']);
// $res = $bot->sendLocation($room['qiscus_room_id']);
// $res = $bot->sendReply($room['qiscus_room_id']);
// $res = $bot->sendText($room['qiscus_room_ids'], $text);

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
$buttons = [$btn,$btn2];

$imageUrl = "https://content.halocdn.com/media/Default/games/halo-5-guardians/page/h5-guardians-facebook-1200x630-ba103624b3f34af79fe8cb2d340dce3f.jpg";
$title = "May Spaghetti be with Jarjit";
$url = "http://www.yahoo.com";

$card = Card::create()
            ->setText($title)
            ->setImage($imageUrl)
            ->setTitle($title)
            ->setDescription($text)
            ->setUrl($url)
            ->setButtons($buttons);
$default_action = [
    "type" => "postback",
    "postback_text" => "Load more",
    "payload" => [
        "url" => "http://www.yahoo.com",
        "method" => "get",
        "payload" => null]
    ];
$carousel = Carousel::create()
    ->setCards([$card, $card]);

$size = 100;

$file = File::create()
    ->setUrl($imageUrl)
    ->setCaption($text);

$name = "Mirota Kampus 2 Simanjuntak";
$address = "Jalan C Simanjuntak No.70 ; Terban ; Gondokusuman ; Kota Yogyakarta ; Daerah Istimewa Yogyakarta 55223" ; 
$latitude = -7.776235;
$longitude = 110.374928;
$map_url = "http://maps.google.com/?q=-7.776235 ;110.374928" ; 
$encrypted_latitude = "asgahsgtwehgayw" ; 
$encrypted_longitude = "ashjshtweyghgas";

$location = Location::create()
    ->setName($name)
    ->setAddress($address)
    ->setLatitude($latitude)
    ->setLongitude($longitude)
    ->setMapUrl($map_url)
    ->setEncryptedLatitude($encrypted_latitude)
    ->setEncryptedLongitude($encrypted_longitude);

$reply = Reply::create()
    ->setText($text)
    ->setRepliedCommentId(20900820);

$type = "promo"; 
$content = ["message" => "ini custom kok"];

$custom = Custom::create()
    ->setType($type)
    ->setContent($content);



// $res = $bot->sendButton(829055, $text, [$btn, $btn2]);
// $res = $bot->sendCard(829055,$text, $card);
// $res = $bot->sendCarousel(829055, $carousel);
$res = $bot->sendCustom(829055, $custom);
// $res = $bot->sendDocument(829055, $file);
// $res = $bot->sendImage(829055, $file);
// $res = $bot->sendLocation(829055, $location);
// $res = $bot->sendReply(829055, $reply);
// $res = $bot->sendText(829055, $text);

// $bot->sendButton($roomId, 'teksnya', [$btn. $btn1])