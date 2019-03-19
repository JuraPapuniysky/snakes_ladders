<?php
/**
 * Created by PhpStorm.
 * User: wsst17
 * Date: 19.03.19
 * Time: 13:46
 */

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