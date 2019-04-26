<?php

use PHPUnit\Framework\TestCase;
use Kiwari\Model\Location;

class LocationTest extends TestCase
{
    public function testGivenNullLabelThenShowError(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        Location::create()
            ->setLabel(null);
    }

    public function testGivenLabelThenGetLabelAndDefaultMethodDefaultType(): void
    {
        $label = 'Hello World';

        $btn = Location::create()
                    ->setLabel($label);
        
        $this->assertEquals($btn->getLabel(), $label);
        $this->assertEquals($btn->getMethod(), Location::METHOD_GET);
        $this->assertEquals($btn->getType(), Location::TYPE_LINK);
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

        $btn = Location::create()
                    ->setLabel($label)
                    ->setMethod(Location::METHOD_POST)
                    ->setType(Location::TYPE_POSTBACK)
                    ->setPayload($payload);
        var_dump(json_encode($btn));
        
        $this->assertEquals($btn->getLabel(), $label);
        $this->assertEquals($btn->getMethod(), Location::METHOD_POST);
        $this->assertEquals($btn->getType(), Location::TYPE_POSTBACK);
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

        $btn = Location::create()
                    ->setLabel($label)
                    ->setMethod(Location::METHOD_POST)
                    ->setType(Location::TYPE_POSTBACK)
                    ->setPayload($payload);

        $this->assertEquals($btn->getLabel(), $label);
        $this->assertEquals($btn->getMethod(), Location::METHOD_POST);
        $this->assertEquals($btn->getType(), Location::TYPE_POSTBACK);
        $this->assertEquals($btn->getUrl(), null);
        $this->assertEquals($btn->getPayload(), $payload);

        $this->assertEquals(json_encode($btn), json_encode([
            'type' => Location::TYPE_POSTBACK,
            'method' => Location::METHOD_POST,
            'label' => $label,
            'payload' => $payload,
            'url' => null
        ]));
    }

    public function testGivenUrlThenShowDefaultWithLink(): void
    {
        $label = 'Go to Facebook';
        $url = 'https://www.facebook.com';

        $btn = Location::create()
                    ->setLabel($label)
                    ->setUrl($url);

        $this->assertEquals($btn->getLabel(), $label);
        $this->assertEquals($btn->getMethod(), Location::METHOD_GET);
        $this->assertEquals($btn->getType(), Location::TYPE_LINK);
        $this->assertEquals($btn->getUrl(), $url);
        $this->assertEquals($btn->getPayload(), null);
    }
    
}