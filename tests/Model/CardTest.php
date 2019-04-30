<?php

use PHPUnit\Framework\TestCase;
use Kiwari\Model\Card;
use Kiwari\Model\Button;
use Kiwari\Model\Variables;


class CardTest extends TestCase
{
    public function testGivenNullLabelThenShowError(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        Card::create()
            ->setLabel(null);
    }

    public function testCreateOneCard(): void
    {
        $fileUrl = 'https://d1edrlpyc25xu0.cloudfront.net/kiwari-prod/raw/upload/iaczqmgLLJ/wav_wav_wavv.mp3';
        $text = 'halo bro, ini dari kiwari bot sdk php';

        $label = 'Goku';
        $payload =  [
                    "url"=> "https://www.google.com/search?q=goku",
                    "method"=> "get",
                    "payload"=> null
                    ];
        $btn2 = Button::create()
        ->setLabel("hmmmm")
        ->setMethod(Button::METHOD_GET)
        ->setType(Button::TYPE_LINK)
        ->setPayload($payload);

        $buttons = [$btn2,$btn2];
        $image = "https://content.halocdn.com/media/Default/games/halo-5-guardians/page/h5-guardians-facebook-1200x630-ba103624b3f34af79fe8cb2d340dce3f.jpg";
        $title = "May Spaghetti be with Jarjit";
        $url = "http://www.yahoo.com";

        $card = Card::create()
        ->setText($title)
        ->setImage($image)
        ->setTitle($title)
        ->setDescription($text)
        ->setUrl($url)
        ->setButtons($buttons);

        var_dump(json_encode($card));
        $this->assertEquals($card->getImage(), $image);
    }

    // public function testGivenLabelThenGetLabelAndDefaultMethodDefaultType(): void
    // {
    //     $label = 'Hello World';

    //     $btn = Card::create()
    //                 ->setLabel($label);
        
    //     $this->assertEquals($btn->getLabel(), $label);
    //     $this->assertEquals($btn->getMethod(), Card::METHOD_GET);
    //     $this->assertEquals($btn->getType(), Card::TYPE_LINK);
    //     $this->assertEquals($btn->getUrl(), null);
    //     $this->assertEquals($btn->getPayload(), null);
    // }

    // public function testGivenLabelMethodPostTypePostBackPayload(): void
    // {
    //     $label = 'Order Here';
    //     $payload = [
    //         'product' => [
    //             'id' => 1,
    //             'name' => 'chair',
    //             'price' => 400000,
    //             'qty' => 10
    //         ],
    //         'payment' => 'BCA'
    //     ];

    //     $btn = Card::create()
    //                 ->setLabel($label)
    //                 ->setMethod(Card::METHOD_POST)
    //                 ->setType(Card::TYPE_POSTBACK)
    //                 ->setPayload($payload);
    //     var_dump(json_encode($btn));
        
    //     $this->assertEquals($btn->getLabel(), $label);
    //     $this->assertEquals($btn->getMethod(), Card::METHOD_POST);
    //     $this->assertEquals($btn->getType(), Card::TYPE_POSTBACK);
    //     $this->assertEquals($btn->getUrl(), null);
    //     $this->assertEquals($btn->getPayload(), $payload);
    // }

    // public function testGivenAllPropsThenExpectJson(): void 
    // {
    //     $label = 'Order Now!';
    //     $payload = [
    //         'product' => [
    //             'id' => 23,
    //             'name' => 'yamaha psr 3000',
    //             'price' => 10000000,
    //             'qty' => 1
    //         ],
    //         'payment' => 'Mandiri'
    //     ];

    //     $btn = Card::create()
    //                 ->setLabel($label)
    //                 ->setMethod(Card::METHOD_POST)
    //                 ->setType(Card::TYPE_POSTBACK)
    //                 ->setPayload($payload);

    //     $this->assertEquals($btn->getLabel(), $label);
    //     $this->assertEquals($btn->getMethod(), Card::METHOD_POST);
    //     $this->assertEquals($btn->getType(), Card::TYPE_POSTBACK);
    //     $this->assertEquals($btn->getUrl(), null);
    //     $this->assertEquals($btn->getPayload(), $payload);

    //     $this->assertEquals(json_encode($btn), json_encode([
    //         'type' => Card::TYPE_POSTBACK,
    //         'method' => Card::METHOD_POST,
    //         'label' => $label,
    //         'payload' => $payload,
    //         'url' => null
    //     ]));
    // }

    // public function testGivenUrlThenShowDefaultWithLink(): void
    // {
    //     $label = 'Go to Facebook';
    //     $url = 'https://www.facebook.com';

    //     $btn = Card::create()
    //                 ->setLabel($label)
    //                 ->setUrl($url);

    //     $this->assertEquals($btn->getLabel(), $label);
    //     $this->assertEquals($btn->getMethod(), Card::METHOD_GET);
    //     $this->assertEquals($btn->getType(), Card::TYPE_LINK);
    //     $this->assertEquals($btn->getUrl(), $url);
    //     $this->assertEquals($btn->getPayload(), null);
    // }
    
}