<?php

namespace Kiwari\Handler;
use Unirest\Request;
use Unirest\Request\Body;
use Kiwari\Util\Url;

class SendImage
{
    public static function request($accessToken, int $roomId)
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'image',
            'topic_id' => $roomId,
            'payload' => json_encode([
                "url" => "https://i.ytimg.com/vi/4x2ccZbHHwc/maxresdefault.jpg",
                "caption" => "Ini gambar siapa?",
                "file_name" => "Nama file", 
                "size" => 0,
                "pages" => 1,
                "encryption_key" => "ashasgewfrsasfasra"
              ])
        ]));
    }
}