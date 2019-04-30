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

    public function testCreateOneImage(): void
    {
        $text = 'halo bro, ini dari kiwari bot sdk php';
        $imageUrl = "https://content.halocdn.com/media/Default/games/halo-5-guardians/page/h5-guardians-facebook-1200x630-ba103624b3f34af79fe8cb2d340dce3f.jpg";
                
        $image = Image::create()
            ->setUrl($imageUrl)
            ->setCaption($text);

        var_dump(json_encode($image));

        $this->assertEquals($image->getUrl(), $imageUrl);
    }

 
    
}