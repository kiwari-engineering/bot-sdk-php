<?php

use PHPUnit\Framework\TestCase;
use Kiwari\Model\Image;

class ImageTest extends TestCase
{
    public function testGivenNullLabelThenShowError(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        Image::create()
            ->setLabel(null);
    }

    public function testGivenLabelThenGetLabelAndDefaultMethodDefaultType(): void
    {
        $label = 'Hello World';

        $btn = Image::create()
                    ->setLabel($label);
        
        $this->assertEquals($btn->getLabel(), $label);
        $this->assertEquals($btn->getMethod(), Image::METHOD_GET);
        $this->assertEquals($btn->getType(), Image::TYPE_LINK);
        $this->assertEquals($btn->getUrl(), null);
        $this->assertEquals($btn->getPayload(), null);
    }

    public function testGivenLabelMethodPostTypePostBackPayload(): void
    {
        $label = 'Order Here';
        $payload = [
            'product' => [
                'id' => 1,
                'name' => 'chair',
                'price' => 400000,
                'qty' => 10
            ],
            'payment' => 'BCA'
        ];

        $btn = Image::create()
                    ->setLabel($label)
                    ->setMethod(Image::METHOD_POST)
                    ->setType(Image::TYPE_POSTBACK)
                    ->setPayload($payload);
        var_dump(json_encode($btn));
        
        $this->assertEquals($btn->getLabel(), $label);
        $this->assertEquals($btn->getMethod(), Image::METHOD_POST);
        $this->assertEquals($btn->getType(), Image::TYPE_POSTBACK);
        $this->assertEquals($btn->getUrl(), null);
        $this->assertEquals($btn->getPayload(), $payload);
    }

    public function testGivenAllPropsThenExpectJson(): void 
    {
        $label = 'Order Now!';
        $payload = [
            'product' => [
                'id' => 23,
                'name' => 'yamaha psr 3000',
                'price' => 10000000,
                'qty' => 1
            ],
            'payment' => 'Mandiri'
        ];

        $btn = Image::create()
                    ->setLabel($label)
                    ->setMethod(Image::METHOD_POST)
                    ->setType(Image::TYPE_POSTBACK)
                    ->setPayload($payload);

        $this->assertEquals($btn->getLabel(), $label);
        $this->assertEquals($btn->getMethod(), Image::METHOD_POST);
        $this->assertEquals($btn->getType(), Image::TYPE_POSTBACK);
        $this->assertEquals($btn->getUrl(), null);
        $this->assertEquals($btn->getPayload(), $payload);

        $this->assertEquals(json_encode($btn), json_encode([
            'type' => Image::TYPE_POSTBACK,
            'method' => Image::METHOD_POST,
            'label' => $label,
            'payload' => $payload,
            'url' => null
        ]));
    }

    public function testGivenUrlThenShowDefaultWithLink(): void
    {
        $label = 'Go to Facebook';
        $url = 'https://www.facebook.com';

        $btn = Image::create()
                    ->setLabel($label)
                    ->setUrl($url);

        $this->assertEquals($btn->getLabel(), $label);
        $this->assertEquals($btn->getMethod(), Image::METHOD_GET);
        $this->assertEquals($btn->getType(), Image::TYPE_LINK);
        $this->assertEquals($btn->getUrl(), $url);
        $this->assertEquals($btn->getPayload(), null);
    }
    
}