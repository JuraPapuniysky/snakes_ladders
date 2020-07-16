<?php

declare(strict_types=1);

namespace AppV2\Messenger\Message;

interface MessageInterface
{
    public function setText(string $text): void;

    public function getText(): string;
}