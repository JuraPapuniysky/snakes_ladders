<?php

namespace App;


class Dice
{
    public static function getValue()
    {
        return rand(1, 6);
    }
}