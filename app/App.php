<?php

namespace App;


class App
{

    private static $instance = null;

    private $player;

    private $playerPosition;

    public function __construct()
    {
    }

    public function __clone()
    {
    }

    /**
     * @param Player $player
     * @return App|null
     */
    public static function getInstance(Player $player)
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
            self::$instance->player = $player;
        }
        return self::$instance;
    }

    public function play()
    {
        while ($this->playerPosition !== 100) {
            $value = Dice::getValue();
            $this->playerPosition = $this->player->getNewPosition($value);
            sleep(1);
            echo $this->getMessage($value, $this->player->getMessage());
        }
    }

    /**
     * @param $diceValue
     * @param $playerMessage
     * @return string
     */
    private function getMessage(int $diceValue, string $playerMessage): string
    {
        return $diceValue . '-' . $playerMessage . "\n";
    }
}