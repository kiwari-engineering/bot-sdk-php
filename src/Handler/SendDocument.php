<?php

namespace Kiwari\Handler;

use Kiwari\Util\Url;
use Unirest\Request;
use Unirest\Request\Body;

class SendDocument
{
    public static function request($accessToken, $roomId, $document)
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'file_attachment',
            'topic_id' => $roomId,
            'payload' => json_encode($document)
        ]));
    }
    
}

