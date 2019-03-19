<?php

declare(strict_types = 1);

namespace App;

class AbstractMessage
{
    public $player;
    public $message;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }
}