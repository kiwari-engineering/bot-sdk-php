<?php

namespace Kiwari\Handler;
use Unirest\Request;
use Unirest\Request\Body;
use Kiwari\Util\Url;

class SendButton
{
    public static function request($accessToken, $roomId, $text, $btn)
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'buttons',
            'topic_id' => 829055,
            'payload' => json_encode([
                "text" => $text,
                "buttons" => $btn
            ])
            // 'payload' =>  json_encode([
            //     "text"=> "jangan dipencet ya... ini cuma testing",
            //     "buttons"=> [
            //         [
            //             "label"=> "button1",
            //             "type"=> "link",
            //             "payload"=> [
            //                 "url"=> "https://www.google.com",
            //                 "method"=> "get",
            //                 "payload"=> null
            //             ]
            //         ],
            //         [
            //             "label"=> "button2",
            //             "type"=> "postback",
            //             "payload"=> [
            //                 "url"=> "https://www.yahoo.com",
            //                 "method"=> "get",
            //                 "payload"=> null
            //             ]
            //         ]
            //     ]
            // ])
        ]));
    }
}
