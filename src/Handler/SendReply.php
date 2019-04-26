<?php

namespace Kiwari\Handler;
use Unirest\Request;
use Unirest\Request\Body;
use Kiwari\Util\Url;

class SendReply
{
    public static function request($accessToken, int $roomId)
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'reply',
            'topic_id' => 829055,
            'payload' => json_encode([
                "text" => "ini comment",
                "replied_comment_id" => 20900820
            ])
        ]));
    }
}