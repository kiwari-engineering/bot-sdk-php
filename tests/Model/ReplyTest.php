<?php

use PHPUnit\Framework\TestCase;
use Kiwari\Model\Reply;

class ReplyTest extends TestCase
{
    public function testGivenNullTextThenError(): void 
    {
        $this->expectException(\InvalidArgumentException::class);

        Reply::create()->setText(null);
    }

    public function testGivenNulRepliedCommentIdThenError(): void 
    {
        $this->expectException(\InvalidArgumentException::class);

        Reply::create()->setRepliedCommentId(null);
    }

    public function testGivenTextAndRepliedCommentId(): void 
    {
        $text = 'replied by me';
        $repliedCommentId = 123;

        $reply = Reply::create()
                    ->setText($text)
                    ->setRepliedCommentId($repliedCommentId);

        $this->assertEquals($reply->getText(), $text);
        $this->assertEquals($reply->getRepliedCommentId(), $repliedCommentId);

        $this->assertEquals(json_encode($reply), json_encode([
            'text' => $text,
            'replied_comment_id' => $repliedCommentId
        ]));
    }
}