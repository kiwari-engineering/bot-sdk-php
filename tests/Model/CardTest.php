<?php

use PHPUnit\Framework\TestCase;
use Kiwari\Model\Card;

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
        $image = "https://content.halocdn.com/media/Default/games/halo-5-guardians/page/h5-guardians-facebook-1200x630-ba103624b3f34af79fe8cb2d340dce3f.jpg";
        $title = "May Spaghetti be with Jarjit";
        //     "description" => "Oleh sippnshop\n96% (666 feedback)\nRp 49.000.00,-\nBUY 2 GET 1 FREE!!!",
        $url = "http://www.yahoo.com";
        $card = Card::create()
            ->setText($title)
            ->setImage($image)
            ->setTitle($title)
            ->setDescription($title)
            ->setUrl($url);
        $coba = "--------------------";
        // $tempArray = json_decode($card, true);
        $axxx = [1,2,3,4];
        $tempArray = array_push($axxx, ['a'=>'wkwkwkwkw']);
        var_dump($axxx);

            var_dump(json_encode([$card
        ,'a'=>123]));
            var_dump($coba);
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