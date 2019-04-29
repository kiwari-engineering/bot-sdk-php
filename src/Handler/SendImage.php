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
            "message" => "[file]https://i.ytimg.com/vi/4x2ccZbHHwc/maxresdefault.jpg[/file]",
            'payload' => json_encode(
                $image
            )
            // 'payload' => json_encode([
            //     "url" => "https://i.ytimg.com/vi/4x2ccZbHHwc/maxresdefault.jpg",
            //     "caption" => "Ini gambar siapa?",
            //   ])
        ]));
    }
}