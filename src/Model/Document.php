<?php

namespace Kiwari\Model;

use InvalidArgumentException;

class Document implements \JsonSerializable
{
    private $url;
    private $caption;
    // private $file_name;
    // private $size;
    // private $pages;

    public function setUrl($url)
    {
        if ($url == null) {
            throw new InvalidArgumentException("url is required");
        }
        $this->url = $url;
        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setCaption($caption)
    {
        $this->caption = $caption;
        return $this;
    }

    public function getCaption()
    {
        return $this->caption;
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
