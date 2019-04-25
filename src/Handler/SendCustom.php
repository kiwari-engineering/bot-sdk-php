<?php

namespace Kiwari\Handler;

class SendCustom
{
    public static function request($accessToken, int $roomId, string $message)
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'custom',
            'topic_id' => $roomId,
            'comment' => $message,
            // 'payload' => 
        ]));
    }
}
// # custom
// {
//     "type": "promo", // sub type of custom payload
//     "content": {} // can be anything: object, array, string, number in JSON
// }