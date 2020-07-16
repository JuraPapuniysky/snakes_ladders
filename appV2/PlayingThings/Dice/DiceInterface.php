<?php

declare(strict_types=1);

namespace AppV2\PlayingThings\Dice;

interface DiceInterface
{
    public function throwMe(): int;
}