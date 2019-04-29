<?php

namespace Kiwari\Model;

use InvalidArgumentException;

class Location implements \JsonSerializable
{
    private $name;
    private $address;
    private $latitude;
    private $longitude;
    private $map_url;
    private $encrypted_latitude;
    private $encrypted_longitude;

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

    public function setMapUrl($map_url)
    {
        if ($map_url == null) {
            throw new InvalidArgumentException("map_url is required");
        }
        $this->map_url = $map_url;
        return $this;
    }

    public function getMapUrl()
    {
        return $this->map_url;
    }

    public function setEncryptedLatitude($encrypted_latitude)
    {
        $this->encrypted_latitude = $encrypted_latitude;
        return $this;
    }

    public function getEncryptedLatitude()
    {
        return $this->encrypted_latitude;
    }

    public function setEncryptedLongitude($encrypted_longitude)
    {
        $this->encrypted_longitude = $encrypted_longitude;
        return $this;
    }

    public function getEncryptedLongitude()
    {
        return $this->encrypted_longitude;
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
