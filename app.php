<?php

require __DIR__.'/vendor/autoload.php';

$app = new \App\App(\App\Player::getInstance(), new \App\Message(\App\Player::getInstance()), new \App\Dice());
$app->play();
