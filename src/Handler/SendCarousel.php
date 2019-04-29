<?php

namespace Kiwari\Handler;
use Unirest\Request;
use Unirest\Request\Body;
use Kiwari\Util\Url;

class SendCarousel
{
    public static function request($accessToken, int $roomId, $carousel)
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'carousel',
            'topic_id' => $roomId,
            'comment' => "halocoba",
            'payload' => json_encode(
                $carousel
            )
        ]));
    }
}