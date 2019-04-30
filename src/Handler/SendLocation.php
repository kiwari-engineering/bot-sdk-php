<?php

namespace  Kiwari\Handler;
use Unirest\Request;
use Unirest\Request\Body;
use Kiwari\Util\Url;

class SendLocation
{
    public static function request($accessToken, int $roomId, $location)
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'location',
            'topic_id' => $roomId,
            'payload' => json_encode($location)
        ]));
    }
}