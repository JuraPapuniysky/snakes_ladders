<?php

namespace App;

interface MessageInterface
{
    public function setMessage(int $diceValue, string $state);
}
