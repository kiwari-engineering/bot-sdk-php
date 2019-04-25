<?php

use PHPUnit\Framework\TestCase;
use Kiwari\Util\Url;

class UtilTest extends TestCase
{
    private $baseUrl = 'https://qisme.qiscus.com';
    private $apiV1Url = 'https://qisme.qiscus.com/api/v1';
    private $postMessageUrl = 'https://qisme.qiscus.com/api/v1/chat/conversations/post_comment';
    private $postUploadUrl = 'https://qisme.qiscus.com/api/v1/files/uploader';

    public function testGivenBaseUrl(): void
    {
        $this->assertEquals($this->baseUrl, Url::BASE_URL);
    }

    public function testGivenApiV1Url(): void
    {
        $this->assertEquals($this->apiV1Url, Url::API_V1);
    }

    public function testGivenPostMessageUrl(): void
    {
        $this->assertEquals($this->postMessageUrl, Url::POST_MESSAGE);
    }
    
    public function testGivenPostUploadUrl(): void
    {
        $this->assertEquals($this->postUploadUrl, Url::POST_UPLOAD);
    }


}