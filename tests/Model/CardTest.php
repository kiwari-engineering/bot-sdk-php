<?php

use PHPUnit\Framework\TestCase;
use Kiwari\Model\Card;
use Kiwari\Model\Button;

class CardTest extends TestCase
{
    public function testGivenNullTextThenError(): void 
    {
        $this->expectException(\InvalidArgumentException::class);

        Card::create()->setText(null);
    }

    public function testGivenNullImageUrlThenError(): void 
    {
        $this->expectException(\InvalidArgumentException::class);

        Card::create()->setImageUrl(null);
    }

    public function testGivenNullTitleThenError(): void 
    {
        $this->expectException(\InvalidArgumentException::class);

        Card::create()->setTitle(null);
    }

    public function testGivenTextTitleImageUrlUrlDescButonsThenExpectJson(): void 
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
        
        $this->assertEquals($card->getText(), $text);
        $this->assertEquals($card->getImageUrl(), $imageUrl);
        $this->assertEquals($card->getTitle(), $title);
        $this->assertEquals($card->getUrl(), $url);
        $this->assertEquals($card->getDescription(), $desc);
        $this->assertEquals($card->getButtons(), [$btn, $btn2]);

        $this->assertEquals(json_encode($card), json_encode([
            'text' => $text,
            'image' => $imageUrl,
            'title' => $title,
            'description' => $desc,
            'url' => $url,
            'buttons' => [
                $btn,
                $btn2
            ]
        ]));
    }
}