<?php

namespace Kiwari\Handler;
use Unirest\Request;
use Unirest\Request\Body;
use Kiwari\Util\Url;

class SendImage
{
    public static function request($accessToken, int $roomId, $image)
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'file_attachment',
            'topic_id' => $roomId,
            'payload' => json_encode(
                $image
            )
        ]));
    }
}