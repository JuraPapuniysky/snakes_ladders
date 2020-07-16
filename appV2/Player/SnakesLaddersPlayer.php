<?php

declare(strict_types=1);

namespace AppV2\Player;

use AppV2\PlayingThings\Dice\DiceInterface;
use AppV2\Skills\ThrowDiceInterface;

class SnakesLaddersPlayer implements ThrowDiceInterface
{

    public function throwDie(DiceInterface $dice): int
    {
        return $dice->throwMe();
    }
}