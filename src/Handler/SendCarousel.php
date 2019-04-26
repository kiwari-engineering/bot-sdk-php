<?php

namespace Kiwari\Handler;
use Unirest\Request;
use Unirest\Request\Body;
use Kiwari\Util\Url;

class SendCarousel
{
    public static function request($accessToken, int $roomId)
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'carousel',
            'topic_id' => $roomId,
            'comment' => $message,
            'payload' => json_encode([
                "cards" => [
                    [
                        "image" => "http://arterinews.com/wp-content/uploads/2018/01/sp-sq.jpg",
                        "title" => "Imajinasi....... for life",
                        "description" => "hehehe\n96% (666 feedback)\nRp 4.123.000.00,-\nBUY 2 GET 1 FREE!!!",
                        "default_action" => [
                            "type" => "postback",
                            "postback_text" => "Load more", // required only when type is postback
                            "payload" => [
                                "url" => "http://www.yahoo.com",
                                "method" => "get",
                                "payload" => null
                            ]
                        ],
                        "buttons" => [
                            [
                                "label" => "go to home",
                                "type" => "link",
                                "postback_text" => "Load more",
                                "payload" => [
                                    "url" => "https://pics.me.me/ponytago-home-youre-drunk-rt-pokemoniife-go-home-ponta-your-18615138.png",
                                    "method" => "get",
                                    "payload" => null
                                ]
                            ],
                            [
                                "label" => "go to twitter",
                                "type" => "link",
                                "payload" => [
                                    "method" => "get", 
                                    "url" => "http://www.twitter.com"
                                ]
                            ]
                        ]
                    ]
                ]
            ])
        ]));
    }
}