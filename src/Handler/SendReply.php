<?php

namespace Kiwari\Handler;
use Unirest\Request;
use Unirest\Request\Body;
use Kiwari\Util\Url;

class SendReply
{
    public static function request($accessToken, int $roomId, $reply)
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'reply',
            'topic_id' => $roomId,
            'payload' => json_encode(
                $reply
            )
        ]));
    }
}