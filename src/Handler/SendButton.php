<?php

namespace Kiwari\Handler;

use Kiwari\Util\Url;
use Unirest\Request;
use Unirest\Request\Body;

class SendButton
{
    public static function request($accessToken, int $roomId, string $text, array $btns = [])
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'buttons',
            'topic_id' => 829055,
            'payload' => json_encode([
                "text" => $text,
                "buttons" => $btns
            ])
        ]));
    }
}
