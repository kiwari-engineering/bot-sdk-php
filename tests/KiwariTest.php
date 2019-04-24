<?php

use PHPUnit\Framework\TestCase;
use Kiwari\Kiwari;
use InvalidArgumentException;

class KiwariTest extends TestCase
{
    private $accessToken = null;
    private $bot = null;
    private $botNull = null;

    public function setUp(): void 
    {
        $this->accessToken = 'dummy-access-token';
        $this->bot = new Kiwari($this->accessToken);
    }

    public function testGivenNullAccessTokenThenShowError(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->botNull = new Kiwari(null);
    }

    public function testGivenAccessTokenThenShowAccessToken(): void
    {
        $this->assertEquals($this->accessToken, $this->bot->getAccessToken());
    }

    public function testGivenDisableLogThenLogFalse(): void 
    {
        $enableLog = $this->bot->isEnableLog();
        
        $this->assertIsBool($enableLog);
        $this->assertEquals(false, $enableLog);
    }

    public function testGivenEnableLogThenLogTrue(): void 
    {
        $this->bot->enableLog(true);
        $enableLog = $this->bot->isEnableLog();
        
        $this->assertIsBool($enableLog);
        $this->assertEquals(true, $enableLog);
    }

    
}