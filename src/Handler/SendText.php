<?php

namespace Kiwari\Handler;

use Unirest\Request;
use Unirest\Request\Body;
use Kiwari\Util\Url;

class SendText
{
    public static function request($accessToken, int $roomId, string $message)
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'text',
            'topic_id' => $roomId,
            'comment' => $message
        ]));
    }
}


// # text
// null