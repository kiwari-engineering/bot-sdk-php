<?php

namespace Kiwari;

use InvalidArgumentException;

class Kiwari
{
    const ENGINE_URL = 'https://qisme.qiscus.com/api/v1/chat/conversations/post_comment';

    private $accessToken;
    private $enableLog = false;
    private $decodedMessage;

    public function __construct(string $accessToken = null) 
    {
        if ($accessToken == null) {
            throw new InvalidArgumentException("Please setup ACCESS_TOKEN first");
        }

        $this->accessToken = $accessToken;
    }
    
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function enableLog(bool $enableLog)
    {
        $this->enableLog = $enableLog;
    }

    public function isEnableLog()
    {
        return $this->enableLog;
    }

    public function handleIncomingMessage()
    {
        $rawData = file_get_contents('php://input');

        $this->decodedMessage = json_decode($rawData, true);

        if ($this->enableLog) {
            $tmpPath = sys_get_temp_dir() . '/kiwari-bot';
            if (!file_exists($tmpPath)) {
                mkdir($tmpPath);
            }
            $tmpFile = tempnam($tmpPath, 'kiwari-bot-log');
            file_put_contents($tmpFile, $rawData, FILE_APPEND);   
        }
    }

    public function getSender()
    {
        return $this->decodedMessage['from'];
    }

    public function getMyAccount()
    {
        return $this->decodedMessage['my_account'];
    }

    public function getChatRoom()
    {
        return $this->decodedMessage['chat_room'];
    }

    public function getMessage()
    {
        return $this->decodedMessage['message'];
    }

    public function sendButton()
    {

    }

    public function sendCard()
    {

    }

    public function sendCarousel()
    {

    }

    public function sendCustom()
    {

    }

    public function sendDocument()
    {

    }

    public function sendImage()
    {

    }

    public function sendLocation()
    {

    }

    public function sendReply()
    {

    }

    public function sendText()
    {

    }

    public function upload()
    {

    }
}
