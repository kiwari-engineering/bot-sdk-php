<?php

namespace Kiwari\Handler;

class SendButton
{
    public static function request($accessToken, int $roomId, string $message)
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'text',
            'topic_id' => $roomId,
            'comment' => $message,
            // 'payload' => '{ "text": "silahkan pencet", "buttons": [ { "label": "button1", "type": "postback", "payload": { "url": "http://somewhere.com/button1", "method": "get", "payload": null } }, { "label": "button2", "type": "link", "payload": { "url": "http://somewhere.com/button2?id=123" } } ] }'
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
