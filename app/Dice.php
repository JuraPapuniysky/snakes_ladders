<?php

namespace App;


class Dice
{
    public function getValue()
    {
        return rand(1, 6);
    }
}