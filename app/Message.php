<?php

namespace App;


class Message
{
    public $message;

    public $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    /**
     * @param int $diceValue
     * @param string|null $state
     */
    public function setMessage(int $diceValue, string $state = null)
    {
        if ($state === null) {
            $this->message = $diceValue . '-' . $this->player->getCurrentPosition() . "\n";
        } else {
            $this->message = $diceValue . '-' . $this->getPlayerMessage($state) . "\n";
        }
    }

    private function getPlayerMessage($state): string
    {
        return $state . $this->player->getCurrentPosition();
    }
}