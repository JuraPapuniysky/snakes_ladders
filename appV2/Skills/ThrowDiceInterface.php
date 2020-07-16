<?php

declare(strict_types=1);

namespace AppV2\Skills;

use AppV2\PlayingThings\Dice\DiceInterface;

interface ThrowDiceInterface
{
    public function throwDie(DiceInterface $dice): int;
}