<?php

declare(strict_types=1);

namespace AppV2\Messenger;

use AppV2\Messenger\Message\MessageInterface;

interface MessengerInterface
{
    public function send(MessageInterface $message): void;
}