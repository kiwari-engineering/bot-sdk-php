<?php

namespace Kiwari\Model;

use InvalidArgumentException;

class Reply implements \JsonSerializable
{
    // "text" => "ini comment",
    // "replied_comment_id" => 20900820
    private $text;
    private $replied_comment_id;

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

    public function setRepliedCommentId($replied_comment_id)
    {
        if ($replied_comment_id == null) {
            throw new InvalidArgumentException("replied_comment_id is required");
        }
        $this->replied_comment_id = $replied_comment_id;
        return $this;
    }

    public function getRepliedCommentId()
    {
        return $this->replied_comment_id;
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
