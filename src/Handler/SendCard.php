<?php

namespace Kiwari\Handler;

use Unirest\Request;
use Unirest\Request\Body;
use Kiwari\Util\Url;


class SendCard
{
    public static function request($accessToken, int $roomId, $text, $card)
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'card',
            'topic_id' => $roomId,
            'payload' => 
            json_encode(
                $card
            )
            // 'payload' => json_encode([
            //     "text" => "Pilih sesuatu ? hmm...",
            //     "image" => "https://content.halocdn.com/media/Default/games/halo-5-guardians/page/h5-guardians-facebook-1200x630-ba103624b3f34af79fe8cb2d340dce3f.jpg",
            //     "title" => "May Spaghetti be with Jarjit",
            //     "description" => "Oleh sippnshop\n96% (666 feedback)\nRp 49.000.00,-\nBUY 2 GET 1 FREE!!!",
            //     "url" => "http://www.yahoo.com",
            //     "buttons" => [
            //         [
            //             "label" => "button1",
            //             "type" => "postback",
            //             "payload" => [
            //                 "url" => "http://www.google.com",
            //                 "method" => "get",
            //                 "payload" => null
            //             ]
            //         ],
            //         [
            //             "label" => "button2",
            //             "type" => "link",
            //             "payload" => [
            //                 "url" => "http://www.facebook.com",
            //                 "method" => "get",
            //                 "payload" => null
            //             ]
            //         ]
            //     ]
            // ])
        ]));
    }
}