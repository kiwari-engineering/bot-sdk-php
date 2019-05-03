<?php

require '..' . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

use Kiwari\Model\Button;
use Kiwari\Model\Card;
use Kiwari\Model\Carousel;
use Kiwari\Model\Custom;
use Kiwari\Model\Document;
use Kiwari\Model\Location;
use Kiwari\Model\Reply;

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$bot = new \Kiwari\Kiwari(getenv('ACCESS_TOKEN'));
$bot->enableLog(true);
$bot->run();

$sender = $bot->getSender();
$room = $bot->getChatRoom();
$message = $bot->getMessage();

$assetsPath = __DIR__ . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR;

switch ($message['text']) {
    case '/help':

            $res = $bot->sendText($room['qiscus_room_id'], 'Berikut merupakan contoh penggunaan Kiwari Bot SDK');
            $res = $bot->sendButton($room['qiscus_room_id'], 'Berikut daftar perintah yang tersedia : ',[
                Button::create()
                    ->setLabel('Contoh Button')
                    ->setType(Button::TYPE_POSTBACK)
                    ->setUrl('https://google.com'),
                Button::create()
                    ->setLabel('Contoh Card')
                    ->setType(Button::TYPE_POSTBACK)
                    ->setUrl('https://google.com'),
                Button::create()
                    ->setLabel('Contoh Custom')
                    ->setType(Button::TYPE_POSTBACK)
                    ->setUrl('https://google.com'),
                Button::create()
                    ->setLabel('Contoh Image File')
                    ->setType(Button::TYPE_POSTBACK)
                    ->setUrl('https://google.com'),
                Button::create()
                    ->setLabel('Contoh Audio File')
                    ->setType(Button::TYPE_POSTBACK)
                    ->setUrl('https://google.com'),
                Button::create()
                    ->setLabel('Contoh Video File')
                    ->setType(Button::TYPE_POSTBACK)
                    ->setUrl('https://google.com'),
                Button::create()
                    ->setLabel('Contoh Location')
                    ->setType(Button::TYPE_POSTBACK)
                    ->setUrl('https://google.com'),
                Button::create()
                    ->setLabel('Contoh Reply')
                    ->setType(Button::TYPE_POSTBACK)
                    ->setUrl('https://google.com'),
                Button::create()
                    ->setLabel('Contoh Text')
                    ->setType(Button::TYPE_POSTBACK)
                    ->setUrl('https://google.com'),
            ]);

        break;

    case 'Contoh Button':

        $bot->sendButton($room['qiscus_room_id'], 'contoh button', [
            Button::create()
                ->setLabel('Jarjit Singh')
                ->setUrl('https://www.google.com/search?safe=off&source=hp&ei=rgbIXL6ZF8GEvQS1z5y4BQ&q=jarjit+singh&btnK=Google+Search&oq=jarjit+singh&gs_l=psy-ab.3..0l3j0i10l7.1892.2423..2633...0.0..0.110.518.5j1......0....1..gws-wiz.9PGvoF92CXU'),
            Button::create()
                ->setLabel('Youtube')
                ->setUrl('https://youtube.com'),
            Button::create()
                ->setLabel('Facebook')
                ->setUrl('https://facebook.com'),
            Button::create()
                ->setLabel('Twitter')
                ->setUrl('https://twitter.com')
        ]);

        break;
    case 'Contoh Card':
        $bot->sendText($room['qiscus_room_id'], 'ini dari contoh card');
        break;
    case 'Contoh Carousel':
        $bot->sendText($room['qiscus_room_id'], 'ini dari contoh carousel');
        break;
    case 'Contoh Custom':
        $bot->sendText($room['qiscus_room_id'], 'ini dari contoh custom');
        break;
    case 'Contoh Image File':

        $imagePath = $assetsPath . 'image-sample.jpg';
        $uploadedFile = $bot->upload($imagePath);

        $bot->sendDocument($room['qiscus_room_id'], 
            Document::create()
                    ->setUrl($uploadedFile->body->data->url)
                    ->setCaption('contoh caption'));

        break;
    case 'Contoh Audio File':
        
        $audioPath = $assetsPath . 'audio-sample.mp3';
        $uploadedFile = $bot->upload($audioPath);

        $bot->sendDocument($room['qiscus_room_id'],
            Document::create()
                    ->setUrl($uploadedFile->body->data->url)
                    ->setCaption('ini contoh caption'));
            
        break;
    case 'Contoh Video File':

        $videoPath = $assetsPath . 'video-sample.mp4';
        $uploadedFile = $bot->upload($videoPath);

        $bot->sendDocument($room['qiscus_room_id'],
            Document::create()
                    ->setUrl($uploadedFile->body->data->url));

        break;
    case 'Contoh Location':
        $name = "Mirota Kampus 2 Simanjuntak";
        $address = "Jalan C Simanjuntak No.70 ; Terban ; Gondokusuman ; Kota Yogyakarta ; Daerah Istimewa Yogyakarta 55223" ; 
        $latitude = -7.776235;
        $longitude = 110.374928;
        $mapUrl = "http://maps.google.com/?q=-7.776235 ;110.374928" ; 

        $location = Location::create()
            ->setName($name)
            ->setAddress($address)
            ->setLatitude($latitude)
            ->setLongitude($longitude)
            ->setMapUrl($mapUrl);
        
        $bot->sendLocation($room['qiscus_room_id'], $location);

        break;
    case 'Contoh Reply':
        $bot->sendReply($room['qiscus_room_id'], 
            Reply::create()
                ->setText('ini contoh reply')
                ->setRepliedCommentId(22092099));
        break;
    case 'Contoh Text':
        $bot->sendText($room['qiscus_room_id'], 'ini dari contoh text');
        break;

    default:
        $bot->sendText($room['qiscus_room_id'], 'Aduh, aku ga ngerti nih :P, tolong ketik /help');
        break;
}
// $fileUrl = 'https://d1edrlpyc25xu0.cloudfront.net/kiwari-prod/raw/upload/iaczqmgLLJ/wav_wav_wavv.mp3';
// $text = 'halo bro, ini dari kiwari bot sdk php';

// $label = 'Goku';
// $payload =  [
//             "url"=> "https://www.google.com/search?q=goku",
//             "method"=> "get",
//             "payload"=> null
//             ];

// $btn = Button::create()
//             ->setLabel($label)
//             ->setMethod(Button::METHOD_POST)
//             ->setType(Button::TYPE_LINK)
//             ->setPayload($payload);

// $label2 = 'Yamcha';
// $payload2 =  [
//             "url"=> "https://www.google.com/search?q=yamcha",
//             "method"=> "get",
//             "payload"=> null
//             ];

// $btn2 = Button::create()
//             ->setLabel($label2)
//             ->setMethod(Button::METHOD_GET)
//             ->setType(Button::TYPE_LINK)
//             ->setPayload($payload2);
// $buttons = [$btn,$btn2];

// $imageUrl = "https://content.halocdn.com/media/Default/games/halo-5-guardians/page/h5-guardians-facebook-1200x630-ba103624b3f34af79fe8cb2d340dce3f.jpg";
// $title = "May Spaghetti be with Jarjit";
// $url = "http://www.yahoo.com";

// $card = Card::create()
//             ->setText($title)
//             ->setImage($imageUrl)
//             ->setTitle($title)
//             ->setDescription($text)
//             ->setUrl($url)
//             ->setButtons($buttons);
// $default_action = [
//     "type" => "postback",
//     "postback_text" => "Load more",
//     "payload" => [
//         "url" => "http://www.yahoo.com",
//         "method" => "get",
//         "payload" => null]
//     ];
// $carousel = Carousel::create()
//     ->setCards([$card, $card]);

// $size = 100;

// $file = Document::create()
//     ->setUrl($imageUrl)
//     ->setCaption($text);


// $type = "promo"; 
// $content = ["message" => "ini custom kok"];

// $custom = Custom::create()
//     ->setType($type)
//     ->setContent($content);



// $res = $bot->sendButton(829055, $text, [$btn, $btn2]);
// $res = $bot->sendCard(829055,$text, $card);
// $res = $bot->sendCarousel(829055, $carousel);
// $res = $bot->sendCustom(829055, $custom);
// $res = $bot->sendDocument(829055, $file);
// $res = $bot->sendImage(829055, $file);
// $res = $bot->sendLocation(829055, $location);
// $res = $bot->sendReply(829055, $reply);
// $res = $bot->sendText(829055, $text);