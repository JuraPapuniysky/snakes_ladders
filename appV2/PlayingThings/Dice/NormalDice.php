<?php

declare(strict_types=1);

namespace AppV2\PlayingThings\Dice;

class NormalDice implements DiceInterface
{

    public function throwMe(): int
    {
        return rand(1, 6);
    }
}