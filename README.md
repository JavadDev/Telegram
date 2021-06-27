# Telegram
Telegram API Bot

#### Requirement:
PHP >= 7.0
* If the php version is 8, amazing! why? you'll see ;)

You can create bots with this class,
So easy!

```PHP
include 'telegram.php';
$bot = new Telegram('TELEGRAM BOT TOKEN');
```

```PHP
# PHP 7

try {
    $response = $bot->sendMessage($chat_id, $text, $parse_mode, null, null, null, $reply_to_message_id);
    $sent_message_id = $response['message_id'];

    for ($i = 0; $i < 3; $i++) {
        $bot->copyMessage($chat_id, $from_chat_id = $chat_id, $sent_message_id);
    }
} catch (Exception $e) {
    file_put_contents('logs.txt', "$e\n\n", FILE_APPEND);
}
```

```PHP
# PHP 8
try {
    $response = $bot->sendMessage($chat_id, $text, $parse_mode, reply_to_message_id: $reply_to_message_id);
    $sent_message_id = $response['message_id'];

    for ($i = 0; $i < 3; $i++) {
        $bot->copyMessage($chat_id, $from_chat_id = $chat_id, $sent_message_id);
    }
} catch (Exception $e) {
    file_put_contents('logs.txt', "$e\n\n", FILE_APPEND);
}
```

* [Read Telegram API Bot Docs Here](https://core.telegram.org/bots/api)
