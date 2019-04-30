<?php

namespace Kiwari\Handler;

use Unirest\Request;
use Unirest\Request\Body;
use Kiwari\Util\Url;


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
            'payload' => 
            json_encode(
                $card
            )
        ]));
    }
}