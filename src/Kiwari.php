<?php

namespace Kiwari;

use InvalidArgumentException;
use Kiwari\Handler\SendText;
use Kiwari\Handler\SendDocument;
use Kiwari\Handler\Uploader;

class Kiwari
{
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

    public function run()
    {
        $rawData = file_get_contents('php://input');

        $this->decodedMessage = json_decode($rawData, true);

        if ($this->enableLog) {
            $tmpPath = sys_get_temp_dir() . '/kiwari-bot';
            if (!file_exists($tmpPath)) {
                mkdir($tmpPath);
            }
            $tmpFile = $tmpPath . DIRECTORY_SEPARATOR . 'kiwari-bot.log';
            file_put_contents($tmpFile, $rawData . "\n", FILE_APPEND);   
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

    public function sendDocument(int $roomId, $fileUrl, $caption = null)
    {
        if ($roomId < 1) {
            throw new InvalidArgumentException("ROOM_ID can't be 0 [zero]");
        }

        return SendDocument::request($this->getAccessToken(), $roomId, $fileUrl, $caption);
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

    public function sendText(int $roomId = 0, string $message = '')
    {
        if ($roomId < 1) {
            throw new InvalidArgumentException("ROOM_ID can't be 0 [zero]");
        }

        return SendText::request($this->getAccessToken(), $roomId, $message);
    }

    public function upload($filePath)
    {
        return Uploader::upload($this->getAccessToken(), $filePath);
    }
}
