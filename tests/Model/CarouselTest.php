<?php

use PHPUnit\Framework\TestCase;
use Kiwari\Model\Card;
use Kiwari\Model\Button;
use Kiwari\Model\Carousel;

class CarouselTest extends TestCase
{
    public function testGivenNullLabel(): void 
    {
        $this->expectException(\InvalidArgumentException::class);

        Carousel::create()->setCards(null);
    }

    public function testGivenCardsThenExpectJson(): void
    {
        $text = 'Hello this is text';
        $imageUrl = 'https://api.adorable.io/avatars/285/abott@adorable.png';
        $title = 'Jarjit Singh';
        $url = 'https://google.com';
        $desc = 'lorem ipsum dolor sit amet';

        $btn = Button::create()
                    ->setLabel('google')
                    ->setUrl($url);

        $btn2 = Button::create()
                    ->setLabel('google')
                    ->setUrl($url);

        $card = Card::create()
            ->setText($text)
            ->setImageUrl($imageUrl)
            ->setTitle($title)
            ->setUrl($url)
            ->setDescription($desc)
            ->setButtons([$btn, $btn2]);

        $carousel = Carousel::create()->setCards([$card]);
        
        $this->assertEquals($card->getText(), $text);
        $this->assertEquals($card->getImageUrl(), $imageUrl);
        $this->assertEquals($card->getTitle(), $title);
        $this->assertEquals($card->getUrl(), $url);
        $this->assertEquals($card->getDescription(), $desc);
        $this->assertEquals($card->getButtons(), [$btn, $btn2]);

        $this->assertEquals($carousel->getCards(), [$card]);
        $this->assertEquals(json_encode($carousel), json_encode([
            'cards' => [$card]
        ]));

    }
}