<?php

namespace Kiwari\Handler;

use Kiwari\Util\Url;
use Unirest\Request;
use Unirest\Request\Body;

class SendCard
{
    public static function request($accessToken, int $roomId, $text, $card)
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'card',
            'topic_id' => $roomId,
            'payload' => json_encode($card)
        ]));
    }
}