<?php

declare(strict_types = 1);

namespace App;

class Message extends AbstractMessage implements MessageInterface
{
    /**
     * @param int $diceValue
     * @param string|null $state
     */
    public function setMessage(int $diceValue, string $state = null)
    {
        if ($state === null) {
            $curPosition = $this->player->getCurrentPosition();
            $this->message = "${diceValue}-${curPosition}\n";
        } else {
            $playerMessage = $this->getPlayerMessage($state);
            $this->message = "${diceValue}-${playerMessage}\n";
        }
    }

    private function getPlayerMessage(string $state): string
    {
        return $state . $this->player->getCurrentPosition();
    }
}