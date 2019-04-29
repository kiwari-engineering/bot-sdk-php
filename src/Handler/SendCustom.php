<?php

namespace Kiwari\Handler;
use Unirest\Request;
use Unirest\Request\Body;
use Kiwari\Util\Url;

class SendCustom
{
    public static function request($accessToken, int $roomId, $custom)
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'custom',
            'topic_id' => $roomId,
            'payload' => json_encode(
                $custom
            )
            // 'payload' => json_encode([
            //     "type" => "promo", // sub type of custom payload
            //     "content" => ["a" => 1] // can be anything => object, array, string, number in JSON
            // ])
        ]));
    }
}