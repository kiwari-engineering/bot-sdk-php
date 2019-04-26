<?php

namespace Kiwari\Model;

use InvalidArgumentException;

class Location implements \JsonSerializable
{
    const TYPE_POSTBACK = 'postback';
    const TYPE_LINK = 'link';

    const METHOD_GET = 'get';
    const METHOD_POST = 'post';

    private $type = self::TYPE_LINK;
    private $method = self::METHOD_GET;
    private $label;
    private $payload;
    private $url;

    public function setLabel($label)
    {
        if ($label == null) {
            throw new InvalidArgumentException("label is required");
        }
        $this->label = $label;
        return $this;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    public function getMethod()
    {
        return $this->method;
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

    public function setPayload($payload = [])
    {
        $this->payload = $payload;
        return $this;
    }

    public function getPayload()
    {
        return $this->payload;
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
