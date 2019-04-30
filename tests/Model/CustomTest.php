<?php

use PHPUnit\Framework\TestCase;
use Kiwari\Model\Custom;

class CustomTest extends TestCase
{
    public function testGivenNullTypeThenShowError(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        Custom::create()->setType(null);
    }

    public function testGivenNullContentThenShowError(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        Custom::create()->setContent(null);
    }

    public function testGivenTypeAndContentThenExpectJson(): void 
    {
        $type = 'promo';
        $content = [
            'id' => 123,
            'name' => 'work chair',
            'price' => 500000
        ];
        $custom = Custom::create()
                        ->setType($type)
                        ->setContent($content);

        $this->assertEquals($custom->getType(), $type);
        $this->assertEquals($custom->getContent(), $content);
        $this->assertEquals(json_encode($custom), json_encode([
            'type' => 'promo',
            'content' => $content
        ]));

    }
}