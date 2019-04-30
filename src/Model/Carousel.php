<?php

namespace Kiwari\Model;

use InvalidArgumentException;

class Carousel implements \JsonSerializable
{
    private $cards;

    public function setCards($cards)
    {
        if ($cards == null) {
            throw new InvalidArgumentException("cards is required");
        }
        $this->cards = $cards;
        return $this;
    }

    public function getCards()
    {
        return $this->cards;
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
