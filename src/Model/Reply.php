<?php

namespace Kiwari\Model;

use InvalidArgumentException;

class Reply implements \JsonSerializable
{
    private $text;
    private $repliedCommentId;

    public function setText($text)
    {
        if ($text == null) {
            throw new InvalidArgumentException("text is required");
        }
        $this->text = $text;
        return $this;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setRepliedCommentId($repliedCommentId)
    {
        if ($repliedCommentId == null) {
            throw new InvalidArgumentException("replied_comment_id is required");
        }
        $this->repliedCommentId = $repliedCommentId;
        return $this;
    }

    public function getRepliedCommentId()
    {
        return $this->repliedCommentId;
    }

    public static function create()
    {
        return new self();
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
