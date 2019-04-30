<?php

use PHPUnit\Framework\TestCase;
use Kiwari\Model\Location;

class LocationTest extends TestCase
{
    public function testGivenNullNameThenError()
    {
        $this->expectException(\InvalidArgumentException::class);

        Location::create()->setName(null);
    }

    public function testGivenNullAddressThenError()
    {
        $this->expectException(\InvalidArgumentException::class);

        Location::create()->setAddress(null);
    }

    public function testGivenNulllLatThenError()
    {
        $this->expectException(\InvalidArgumentException::class);

        Location::create()->setLatitude(null);
    }

    public  function testGivenNullLngThenError()
    {
        $this->expectException(\InvalidArgumentException::class);

        Location::create()->setLongitude(null);
    }

    public function testGivenNullMapUrlThenError()
    {
        $this->expectException(\InvalidArgumentException::class);

        Location::create()->setMapUrl(null);
    }

    public function testGivenAllPropsThenExpectJson()
    {
        $name = "Mirota Kampus 2 Simanjuntak";
        $address = "Jalan C Simanjuntak No.70 ; Terban ; Gondokusuman ; Kota Yogyakarta ; Daerah Istimewa Yogyakarta 55223"; 
        $latitude = -7.776235;
        $longitude = 110.374928;
        $mapUrl = "http://maps.google.com/?q=-7.776235 ;110.374928";

        $location = Location::create()
                        ->setName($name)
                        ->setAddress($address)
                        ->setLatitude($latitude)
                        ->setLongitude($longitude)
                        ->setMapUrl($mapUrl);

        $this->assertEquals($location->getName(), $name);
        $this->assertEquals($location->getAddress(), $address);
        $this->assertEquals($location->getLongitude(), $longitude);
        $this->assertEquals($location->getLatitude(), $latitude);
        $this->assertEquals($location->getMapUrl(), $mapUrl);

        $this->assertEquals(json_encode($location), json_encode([
            'name' => $name,
            'address' => $address,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'map_url' => $mapUrl
        ]));

    }
}