<?php

declare(strict_types=1);

namespace App;


class Dice
{
    public static function getValue()
    {
        return rand(1, 6);
    }
}