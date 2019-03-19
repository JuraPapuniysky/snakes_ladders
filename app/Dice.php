<?php

declare(strict_types = 1);

namespace App;

class Dice implements DiceInterface
{
    /**
     * @return int
     */
    public function getValue(): int
    {
        return rand(1, 6);
    }
}