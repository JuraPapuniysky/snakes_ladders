<?php

declare(strict_types=1);

namespace AppV2\Messenger\Message;

class StringMessage implements MessageInterface
{
    private string $text = '';

    public function setText(string $text): void
    {
       $this->text = $text;
    }

    public function getText(): string
    {
        return $this->text;
    }
}