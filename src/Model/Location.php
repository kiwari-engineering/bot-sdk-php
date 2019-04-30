<?php

namespace Kiwari\Model;

use InvalidArgumentException;

class Location implements \JsonSerializable
{
    private $name;
    private $address;
    private $latitude;
    private $longitude;
    private $mapUrl;

    public function setName($name)
    {
        if ($name == null) {
            throw new InvalidArgumentException("name is required");
        }
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setAddress($address)
    {
        if ($address == null) {
            throw new InvalidArgumentException("address is required");
        }
        $this->address = $address;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setLatitude($latitude)
    {
        if ($latitude == null) {
            throw new InvalidArgumentException("latitude is required");
        }
        $this->latitude = $latitude;
        return $this;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLongitude($longitude)
    {
        if ($longitude == null) {
            throw new InvalidArgumentException("longitude is required");
        }
        $this->longitude = $longitude;
        return $this;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setMapUrl($mapUrl)
    {
        if ($mapUrl == null) {
            throw new InvalidArgumentException("map_url is required");
        }
        $this->mapUrl = $mapUrl;
        return $this;
    }

    public function getMapUrl()
    {
        return $this->mapUrl;
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
