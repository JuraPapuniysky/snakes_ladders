<?php

namespace app;


class AbstractMessage
{
    public $player;
    public $message;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }
}