<?php

namespace  Kiwari\Handler;
use Unirest\Request;
use Unirest\Request\Body;
use Kiwari\Util\Url;

class SendLocation
{
    public static function request($accessToken, int $roomId, string $message)
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'text',
            'topic_id' => $roomId,
            'comment' => $message,
            // 'payload' => 
        ]));
    }
}
// # location
// {
//     "name": "Mirota Kampus 2 Simanjuntak",
//     "address": "Jalan C Simanjuntak No.70, Terban, Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55223",
//     "latitude": -7.776235, // 0.0 if payload is encrypted
//     "longitude": 110.374928, // 0.0 if payload is encrypted
//     "map_url": "http://maps.google.com/?q=-7.776235,110.374928"
//     "encrypted_latitude": "asgahsgtwehgayw", // Optional, used if E2E encryption enabled
//     "encrypted_longitude": "ashjshtweyghgas" // Optional, used if E2E encryption enabled
//  }