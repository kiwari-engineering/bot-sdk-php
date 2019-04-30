<?php

use PHPUnit\Framework\TestCase;
use Kiwari\Model\Document;

class DocumentTest extends TestCase
{
    public function testGivenNullUrlThenError()
    {
        $this->expectException(\InvalidArgumentException::class);

        Document::create()->setUrl(null);
    }   

    public function testGivenAllPropsThenExpecttJson()
    {
        $fileUrl = 'https://content.halocdn.com/media/Default/games/halo-5-guardians/page/h5-guardians-facebook-1200x630-ba103624b3f34af79fe8cb2d340dce3f.jpg';
        $cap = 'hello world';

        $file = Document::create()
                    ->setUrl($fileUrl)
                    ->setCaption($cap);

        $this->assertEquals($file->getUrl(), $fileUrl);
        $this->assertEquals($file->getCaption(), $cap);

        $this->assertEquals(json_encode($file), json_encode([
            'url' => $fileUrl,
            'caption' => $cap
        ]));

    }
}