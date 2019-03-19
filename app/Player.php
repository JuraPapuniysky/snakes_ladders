<?php

namespace App;


class Player
{
    const START_POSITION = 1;

    private static $instance = null;

    private $currentPosition;

    private $message;

    public function __construct()
    {
    }

    public function __clone()
    {
    }

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
            self::$instance->currentPosition = self::START_POSITION;
        }
        return self::$instance;
    }

    public function getNewPosition(int $diceValue)
    {
        $newPosition = $this->currentPosition + $diceValue;
        if ($newPosition > 100) {
            return $this->currentPosition;
        }
        if (($newPosition % 9) === 0) {
            $this->setIsSnake($newPosition);
        } elseif ($newPosition === 25 || $newPosition === 55) {
            $this->setIsForward($newPosition);
        } else {
            $this->currentPosition += $diceValue;
            $this->message = (string)$this->currentPosition;
        }

        return $this->currentPosition;

    }

    /**
     * @param int $position
     */
    private function setIsSnake(int $position)
    {
        $this->currentPosition = $position - 3;
        $this->message = 'snake' . $this->currentPosition;
    }

    /**
     * @param int $position
     */
    private function setIsForward(int $position)
    {
        $this->currentPosition = $position + 10;
        $this->message = 'ladder' . $this->currentPosition;
    }

    /**
     * @return int
     */
    public function getCurrentPosition(): int
    {
        return $this->currentPosition;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}