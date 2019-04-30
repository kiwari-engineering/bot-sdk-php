<?php

namespace Kiwari\Model;

use InvalidArgumentException;

class Custom implements \JsonSerializable
{
    private $type;
    private $content;

    public function setType($type)
    {
        if ($type == null) {
            throw new InvalidArgumentException("type is required");
        }
        $this->type = $type;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setContent($content)
    {
        if ($content == null) {
            throw new InvalidArgumentException("content is required");
        }
        $this->content = $content;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
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
