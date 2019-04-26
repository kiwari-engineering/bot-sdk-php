<?php

namespace Kiwari\Handler;
use Unirest\Request;
use Unirest\Request\Body;
use Kiwari\Util\Url;

class SendReply
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

// # reply
// ## reply from specified message
// {
//     "text": "ini comment",
//     "replied_comment_id": 16227
// }