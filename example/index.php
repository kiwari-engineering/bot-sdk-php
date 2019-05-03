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
                    ->setLabel('Contoh Carousel')
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
        $bot->sendCard($room['qiscus_room_id'], 'ini teks',
            Card::create()
                ->setText('Ini contoh textnya')
                ->setImageUrl('https://vignette.wikia.nocookie.net/upinipin/images/1/13/4_jarjit.png/revision/latest?cb=20180203141217')
                ->setTitle('ini contoh judulnya')
                ->setDescription('ini contoh deskripsi')
                ->setUrl('https://www.google.com/search?q=jarjit+singh&safe=off&rlz=1C5CHFA_enID828ID828&tbm=isch&source=iu&ictx=1&fir=fHecVrBhuDLpcM%253A%252CUAvPHuNZ8waOSM%252C_&vet=1&usg=AI4_-kR5h1JaCrqS6jGfMR41LepSu6XoWg&sa=X&ved=2ahUKEwi4qZW8-_7hAhVo63MBHS_NCrwQ9QEwA3oECAcQCg#imgrc=_&vet=1')
                ->setButtons([
                    Button::create()
                        ->setLabel('Jarjit Singh')
                        ->setUrl('https://www.google.com/search?safe=off&source=hp&ei=rgbIXL6ZF8GEvQS1z5y4BQ&q=jarjit+singh&btnK=Google+Search&oq=jarjit+singh&gs_l=psy-ab.3..0l3j0i10l7.1892.2423..2633...0.0..0.110.518.5j1......0....1..gws-wiz.9PGvoF92CXU'),
                    Button::create()
                        ->setLabel('Jarjit Singh')
                        ->setUrl('https://www.google.com/search?safe=off&source=hp&ei=rgbIXL6ZF8GEvQS1z5y4BQ&q=jarjit+singh&btnK=Google+Search&oq=jarjit+singh&gs_l=psy-ab.3..0l3j0i10l7.1892.2423..2633...0.0..0.110.518.5j1......0....1..gws-wiz.9PGvoF92CXU')
                ]));
        break;
    case 'Contoh Carousel':
        $bot->sendCarousel($room['qiscus_room_id'], 
                Carousel::create()
                    ->setCards([
                        Card::create()
                            ->setText('Ini contoh textnya')
                            ->setImageUrl('https://vignette.wikia.nocookie.net/upinipin/images/1/13/4_jarjit.png/revision/latest?cb=20180203141217')
                            ->setTitle('ini contoh judulnya')
                            ->setDescription('ini contoh deskripsi')
                            ->setUrl('https://www.google.com/search?q=jarjit+singh&safe=off&rlz=1C5CHFA_enID828ID828&tbm=isch&source=iu&ictx=1&fir=fHecVrBhuDLpcM%253A%252CUAvPHuNZ8waOSM%252C_&vet=1&usg=AI4_-kR5h1JaCrqS6jGfMR41LepSu6XoWg&sa=X&ved=2ahUKEwi4qZW8-_7hAhVo63MBHS_NCrwQ9QEwA3oECAcQCg#imgrc=_&vet=1')
                            ->setButtons([
                                Button::create()
                                    ->setLabel('Jarjit Singh')
                                    ->setUrl('https://www.google.com/search?safe=off&source=hp&ei=rgbIXL6ZF8GEvQS1z5y4BQ&q=jarjit+singh&btnK=Google+Search&oq=jarjit+singh&gs_l=psy-ab.3..0l3j0i10l7.1892.2423..2633...0.0..0.110.518.5j1......0....1..gws-wiz.9PGvoF92CXU'),
                                Button::create()
                                    ->setLabel('Jarjit Singh')
                                    ->setUrl('https://www.google.com/search?safe=off&source=hp&ei=rgbIXL6ZF8GEvQS1z5y4BQ&q=jarjit+singh&btnK=Google+Search&oq=jarjit+singh&gs_l=psy-ab.3..0l3j0i10l7.1892.2423..2633...0.0..0.110.518.5j1......0....1..gws-wiz.9PGvoF92CXU')
                            ]),
                        Card::create()
                            ->setText('Ini contoh textnya')
                            ->setImageUrl('https://vignette.wikia.nocookie.net/upinipin/images/1/13/4_jarjit.png/revision/latest?cb=20180203141217')
                            ->setTitle('ini contoh judulnya')
                            ->setDescription('ini contoh deskripsi')
                            ->setUrl('https://www.google.com/search?q=jarjit+singh&safe=off&rlz=1C5CHFA_enID828ID828&tbm=isch&source=iu&ictx=1&fir=fHecVrBhuDLpcM%253A%252CUAvPHuNZ8waOSM%252C_&vet=1&usg=AI4_-kR5h1JaCrqS6jGfMR41LepSu6XoWg&sa=X&ved=2ahUKEwi4qZW8-_7hAhVo63MBHS_NCrwQ9QEwA3oECAcQCg#imgrc=_&vet=1')
                            ->setButtons([
                                Button::create()
                                    ->setLabel('Jarjit Singh')
                                    ->setUrl('https://www.google.com/search?safe=off&source=hp&ei=rgbIXL6ZF8GEvQS1z5y4BQ&q=jarjit+singh&btnK=Google+Search&oq=jarjit+singh&gs_l=psy-ab.3..0l3j0i10l7.1892.2423..2633...0.0..0.110.518.5j1......0....1..gws-wiz.9PGvoF92CXU'),
                                Button::create()
                                    ->setLabel('Jarjit Singh')
                                    ->setUrl('https://www.google.com/search?safe=off&source=hp&ei=rgbIXL6ZF8GEvQS1z5y4BQ&q=jarjit+singh&btnK=Google+Search&oq=jarjit+singh&gs_l=psy-ab.3..0l3j0i10l7.1892.2423..2633...0.0..0.110.518.5j1......0....1..gws-wiz.9PGvoF92CXU')
                            ])
                    ]));
        break;
    case 'Contoh Custom':
        $bot->sendCustom($room['qiscus_room_id'], 
            Custom::create()
                ->setType('promo')
                ->setContent([
                    'product' => [
                        'id' => 123,
                        'name' => 'sandal mahal',
                        'price' => 5000000
                    ],
                    'discount' => 0.1
                ]));
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