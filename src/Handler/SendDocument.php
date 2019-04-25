<?php

namespace Kiwari\Handler;

use Unirest\Request;
use Unirest\Request\Body;
use Kiwari\Util\Url;

class SendDocument
{
    public static function request($accessToken, $roomId, $fileUrl, $caption = null)
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'file_attachment',
            'topic_id' => $roomId,
            'payload' => json_encode([
                'url' => $fileUrl,
                'caption' => $caption
            ])
        ]));
    }
    
}

