<?php

namespace Kiwari\Handler;

use Unirest\Request;
use Unirest\Request\Body;

class SendText
{

    public function printMessage()
    {
        echo 'this is from send text';
    }

    public function halo()
    {
        $headers = ['Accept' => 'application/json'];
        $data = [
            'access_token' => 'eyJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoyODcsInRpbWVzdGFtcCI6IjIwMTktMDQtMjIgMDc6NDE6MTkgKzAwMDAifQ._VfhBwYmFUAha_Xd-gPCLtMZz5p60xVXEMwCmJkhZug',
            'topic_id' => 2155674,
            'comment' => 'halo topan, ini dari kiwari sdk php',
            'type' => 'text'
        ];

        $body = Body::form($data);

        $response = Request::post('https://qisme.qiscus.com/api/v1/chat/conversations/post_comment', $headers, $body);

        var_dump($response);
    }
    
}


// # text
// null