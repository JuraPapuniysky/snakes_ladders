<?php

require __DIR__ . '/vendor/autoload.php';

$app = new \App\App(\App\Player::getInstance(), new \App\Message(\App\Player::getInstance()), new \App\Dice());
//$app->play();

//V2

$player = new \AppV2\Player\SnakesLaddersPlayer();

$messenger = new \AppV2\Messenger\ConsoleMessenger();


$game = new AppV2\Game\SnakesLadders($player, $messenger, new AppV2\PlayingThings\Dice\NormalDice(),
    new \AppV2\Messenger\Message\StringMessage());

$game->play();
