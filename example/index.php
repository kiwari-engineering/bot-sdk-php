<?php

require '..' . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

// use Kiwari\Kiwari;
// use Kiwari\Handler

$accessToken = '';

$bot = new Kiwari\Handler\SendText();
$bot->printMessage();
$bot->halo();


/**
 *  - inisiasi: access_token
 *  - register webhook: pasang di dashboard
 *  - provide send[MessageType]
 */