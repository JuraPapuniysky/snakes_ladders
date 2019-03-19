<?php

namespace App;


class App
{

    private $player;

    private $playerPosition;

    private $dice;

    private $message;


    /**
     * App constructor.
     * @param Player $player
     * @param Message $message
     * @param Dice $dice
     */
    public function __construct(Player $player, Message $message, Dice $dice)
    {
        $this->player = $player;
        if ($dice instanceof DiceInterface){
            $this->dice = $dice;
        }
        if ($message instanceof  MessageInterface){
            $this->message = $message;
        }
    }

    public function play()
    {
        while ($this->player->getCurrentPosition() !== 100) {
            $value = $this->dice->getValue();
            $this->playerPosition = $this->getNewPosition($value);
            usleep(10000);
            echo $this->message->message;
        }
    }

    public function getNewPosition(int $diceValue)
    {
        $newPosition = $this->player->getCurrentPosition() + $diceValue;
        if ($newPosition > 100) {
            return $this->player->getCurrentPosition();
        }
        if (($newPosition % 9) === 0) {
            $this->player->setIsSnake($newPosition);
            $this->message->setMessage($diceValue,'snake');
        } elseif ($newPosition === 25 || $newPosition === 55) {
            $this->player->setIsForward($newPosition);
            $this->message->setMessage($diceValue, 'ladder');
        } else {
            $this->player->setCurrentPosition($this->player->getCurrentPosition() + $diceValue);
            $this->message->setMessage($diceValue);
        }

        return $this->player->getCurrentPosition();

    }


}