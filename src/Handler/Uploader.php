<?php

namespace Kiwari\Handler;
use Unirest\Request;
use Unirest\Request\Body;
use Kiwari\Util\Url;

class Uploader
{
    public static function upload($accessToken, $filePath)
    {
        return Request::post(Url::POST_UPLOAD, [
            'Accept' => 'application/json'
        ], Body::multipart(
            ['access_token' => $accessToken], 
            ['raw_file' => $filePath]
        ));
    }
    
}
