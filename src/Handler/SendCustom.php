<?php

namespace Kiwari\Handler;

use Kiwari\Util\Url;
use Unirest\Request;
use Unirest\Request\Body;

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
            'payload' => json_encode($custom)
        ]));
    }
}