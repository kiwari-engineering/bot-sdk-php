<?php

namespace Kiwari\Handler;

class SendButton
{
    public static function request($accessToken, $roomId, $message, $buttons)
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'buttons',
            'topic_id' => $roomId,
            'payload' =>  array (
                "text"=> "silahkan pencet",
                "buttons"=> [
                    array (
                        "label"=> "button1",
                        "type"=> "postback",
                        "payload"=> array(
                            "url"=> "http//:www.google.com",
                            "method"=> "get",
                            "payload"=> null
                        )
                    ),
                    array (
                        "label"=> "button2",
                        "type"=> "link",
                        "payload"=> array(
                            "url"=> "http//:www.google.com/button2?id=123"
                        )
                    )
                ]
            )
        ]));
    }
}
// # buttons
// {
//     "text": "silahkan pencet",
//     "buttons": [
//         {
//             "label": "button1",
//             "type": "postback",
//             "payload": {
//                 "url": "http://somewhere.com/button1",
//                 "method": "get",
//                 "payload": null
//             }
//         },
//         {
//             "label": "button2",
//             "type": "link",
//             "payload": {
//                 "url": "http://somewhere.com/button2?id=123"
//             }
//         }
//     ]
// }
