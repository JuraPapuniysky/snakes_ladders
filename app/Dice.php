<?php

namespace App;


class Dice implements DiceInterface
{
    public function getValue()
    {
        return rand(1, 6);
    }
}