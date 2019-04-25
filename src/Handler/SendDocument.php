<?php

namespace Kiwari\Handler;

class SendDocument
{
    public static function request($accessToken, int $roomId, string $message)
    {
        return Request::post(Url::POST_MESSAGE, [
            'Accept' => 'application/json'
        ], Body::form([
            'access_token' => $accessToken,
            'type' => 'document',
            'topic_id' => $roomId,
            'comment' => $message,
            // 'payload' => 
        ]));
    }
}
// # file_attachment
// {
//     "url": "https://res.cloudinary.com/qiscus/image/upload/USWiylE7Go/ios-15049438515185.png",
//     "caption": "Ini gambar siapa?",
//     "file_name": "Nama file", 
//     "size": 0,
//     "pages": 1,
//     "encryption_key": "ashasgewfrsasfasra" // Optional, Base64 of simetric key used to encrypt and decrypt file
//   }