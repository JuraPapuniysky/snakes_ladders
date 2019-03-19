<?php

declare(strict_types = 1);

namespace App;

class Player
{
    const START_POSITION = 1;

    private static $instance = null;

    /**
     * @var integer
     */
    private $currentPosition;

    public function __construct()
    {
    }

    public function __clone()
    {
    }

    /**
     * @return Player
     */
    public static function getInstance(): Player
    {
        if (null === self::$instance) {
            self::$instance = new self();
            self::$instance->currentPosition = self::START_POSITION;
        }
        return self::$instance;
    }

    /**
     * @param int $position
     */
    public function setIsSnake(int $position)
    {
        $this->currentPosition = $position - 3;
    }

    /**
     * @param int $position
     */
    public function setIsForward(int $position)
    {
        $this->currentPosition = $position + 10;
    }

    public function setCurrentPosition($position)
    {
        $this->currentPosition = $position;
    }

    /**
     * @return int
     */
    public function getCurrentPosition(): int
    {
        return $this->currentPosition;
    }
}