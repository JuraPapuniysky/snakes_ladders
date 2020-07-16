<?php

declare(strict_types=1);

namespace AppV2\Messenger;

use AppV2\Exceptions\EmptyMessageException;
use AppV2\Messenger\Message\MessageInterface;

class ConsoleMessenger implements MessengerInterface
{

    public function send(MessageInterface $message): void
    {
        if (empty($message->getText()) === false) {
            echo $message->getText() . PHP_EOL;
        } else {
            throw new EmptyMessageException('Message text is empty');
        }

    }
}