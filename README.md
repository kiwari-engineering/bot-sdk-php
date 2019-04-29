# Kiwari Bot SDK [PHP]

## Requirements

* PHP
* Composer
* Kiwari Account for Bot
* ngrok _(for running the example)_

## How to use

### Setup

* Please add this SDK to your Bot PHP usng composer

```bash
$ composer require kiwari/kiwari-bot-sdk
```

* Get your `acces_token` of Kiwari Bot Account, you can find in Kiwari Dashboard
* Init Kiwari Bot SDK

```php
<?php

require 'vendor/autoload.php';

$bot = new \Kiwari\Kiwari('your-access-token-here');
$bot->enableLog(true); // you can enable log, the log file is inside your tmp

//now you need to run the bot
$bot->run();
```

* After you init Kiwari Bot, you can get `message`, `chatroom`, `sender`, and `myaccount`

```php
<?php

//and now you can get the incomming data by using :
$sender = $bot->getSender();
/**
 * to get the sender
 * example data for method : $bot->getSender()
 * 
 * {
 *      "id": 287,
 *      "phone_number": "+6285123123123",
 *      "fullname": "Jarjit Singh",
 *      "qiscus_email": "jarjitid@kiwari-prod.com",
 *      "qiscus_id": 11
 * }
 */

$myAccount = $bot->getMyAccount();
/**
 * to get the my account or the bot
 * example data for method : $bot->getMyAccount()
 * 
 * {
 *      "id": 22,
 *      "phone_number": "+628681234567",
 *      "fullname": "Cuti Bot",
 *      "qiscus_email": "cutibot_id@kiwari-prod.com"
 * }
 */

$room = $bot->getChatRoom();
/**
 * to get chatroom
 * example data for method : $bot->getChatRoom()
 * 
 * {
 *     "id": 1510,
 *     "qiscus_room_name": "Name of Chat Room",
 *     "qiscus_room_id": 8777,
 *     "is_group_chat": false,
 *     "created_at": "2017-06-02T01:33:12.233Z",
 *     "updated_at": "2017-06-02T01:33:12.233Z",
 *     "application_id": 3,
 *     "group_avatar_url": "",
 *     "is_official_chat": false,
 *     "target_user_id": 443,
 *     "is_public_chat": false,
 *     "is_channel": false,
 *     "users": [
 *         {
 *             "id": 287,
 *             "phone_number": "+6285123123123",
 *             "fullname": "Jarjit Singh",
 *             "qiscus_email": "jarjitid@kiwari-prod.com",
 *             "qiscus_id": 784
 *          },
 *          {
 *              "id": 22,
 *              "phone_number": "+628681234567",
 *              "fullname": "Cuti Bot",
 *              "qiscus_email": "cutibot_id@kiwari-prod.com",
 *              "qiscus_id": 2039
 *           }
 *       ],
 *       "chat_name": "Group Chat Name",
 *       "chat_avatar_url": ""
 * }
 */

$message = $bot->getMessage();
/**
 * to get the message
 * example data for method : $bot->getMessage()
 * 
 * {
 *     "payload": {},
 *     "text": "halo bro",
 *     "type": "text"
 * }
 */
```

* Now you can send the message into the opponent user by call the method that provided like below

* **Send Message Text**

```php
<?php

$response = $bot->sendText($room['qiscus_room_id'], 'Hello, this is from Kiwari Bot SDK PHP');

var_dump($response); //you can see the response if you need to debug or something to handle in your bot
```

* **Send Button**

_More example, please see the test [here](tests/Model/ButtonTest.php)_

```php
<?php

$response = $bot->sendButton($room['qiscus_room_id'], 'This is message Example', [
    \Kiwari\Model\Button::create()
        ->setLabel('Google')
        ->setUrl('https://google.com'),
    \Kiwari\Model\Button::create()
        ->setLabel('Facebook')
        ->setUrl('https://facebook.com'),
    \Kiwari\Model\Button::create()
        ->setLabel('Twitter')
        ->setUrl('https://twitter.com')
]);

var_dump($response);
```

* **Send Document**

_If you want to send document message, you need to upload the document or file first by using `$bot->upload()` function_

```php
<?php

$path = '/Users/andhikayuana/Downloads/wav_wav_wavv.mp3';
$upload = $bot->upload($path);
var_dump($upload->body->data->url); // you can get the file url here

//now you can send the document like below
$response = $bot->sendDocument($room['qiscus_room_id'], $upload->body->data->url);
var_dump($response);
```

## Example

You can try example by using [this example](./example)

## Run Webhook Example

* Run webhook example by executing

```bash
$ make run-example
```

* After you run webhook in the local, you need to bring online using ngrok

```bash
$ ngrok http 3000
```

* Now you can access your webhook url online in the internet like below

```
Forwarding                    https://xxxxxxxx.ngrok.io -> localhost:3000  
```

* Register the url in the Kiwari dashboard
* Now you can chat with your Bot

## Test

```bash
$ make test
```