<?php

declare(strict_types=1);

namespace AppV2\Game;

use AppV2\Messenger\Message\MessageInterface;
use AppV2\Messenger\MessengerInterface;
use AppV2\PlayingThings\Dice\DiceInterface;
use AppV2\Skills\ThrowDiceInterface;

class SnakesLadders implements GameInterface
{
    private ThrowDiceInterface $player;

    private MessengerInterface $messenger;

    private DiceInterface $dice;

    private MessageInterface $message;

    private int $playerCurrentPosition = 0;

    public function __construct(ThrowDiceInterface $player, MessengerInterface $messenger, DiceInterface $dice, MessageInterface $message)
    {
        $this->player = $player;
        $this->messenger = $messenger;
        $this->dice = $dice;
        $this->message = $message;
    }

    public function play(): void
    {
        $time = microtime(true);

        while ($this->playerCurrentPosition !== 100) {
            $value = $this->player->throwDie($this->dice);
            $this->getNewPosition($value);
            //usleep(1000);
            //echo $this->message->getText().PHP_EOL;

            $this->messenger->send($this->message);
        }

        $executeTime = microtime(true) - $time;
        echo (string)$executeTime . PHP_EOL;
    }

    private function getNewPosition(int $diceValue): int
    {
        $newPosition = $this->playerCurrentPosition + $diceValue;

        if ($newPosition > 100) {
            return $this->playerCurrentPosition;
        }

        if (($newPosition % 9) === 0) {
            $this->setIsSnake($newPosition);
            $this->setMessage($diceValue, 'snake');
        } elseif ($newPosition === 25 || $newPosition === 55) {
            $this->setIsForward($newPosition);
            $this->setMessage($diceValue, 'ladder');
        } else {
            $this->playerCurrentPosition = $this->playerCurrentPosition + $diceValue;
            $this->setMessage($diceValue);
        }

        return $this->playerCurrentPosition;
    }

    public function setIsSnake(int $position): void
    {
        $this->playerCurrentPosition = $position - 3;
    }

    public function setIsForward(int $position): void
    {
        $this->playerCurrentPosition = $position + 10;
    }

    private function setMessage(int $diceValue, string $state = null): void
    {
        if ($state === null) {
            $this->message->setText("${diceValue} - {$this->playerCurrentPosition}");
        } else {
            $playerMessage = $this->getPlayerMessage($state);
            $this->message->setText("${diceValue}-${playerMessage}");
        }
    }

    private function getPlayerMessage(string $state): string
    {
        return $state . $this->playerCurrentPosition;
    }
}