<?php

namespace Kiwari\Model;

use InvalidArgumentException;

class Card implements \JsonSerializable
{
    private $text;
    private $image;
    private $title;    
    private $description;
    private $url;
    private $buttons;
    
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

    public function setImage($image)
    {
        if ($image == null) {
            throw new InvalidArgumentException("image is required");
        }
        $this->image = $image;
        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setTitle($title)
    {
        if ($title == null) {
            throw new InvalidArgumentException("title is required");
        }
        $this->title = $title;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setButtons($buttons)
    {
        $this->buttons = $buttons;
        return $this;
    }

    public function getButtons()
    {
        return $this->buttons;
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
