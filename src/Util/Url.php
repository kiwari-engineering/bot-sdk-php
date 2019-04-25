<?php

namespace Kiwari\Util;

class Url
{
    const BASE_URL      = 'https://qisme.qiscus.com';
    const API_V1        = self::BASE_URL . '/api/v1';
    const POST_MESSAGE  = self::API_V1 . '/chat/conversations/post_comment';
    const POST_UPLOAD   = self::API_V1 . '/files/uploader';
}
