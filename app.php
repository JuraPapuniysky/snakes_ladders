<?php

require __DIR__ . '/vendor/autoload.php';

$v1StartTime = microtime(true);
$app = new \App\App(\App\Player::getInstance(), new \App\Message(\App\Player::getInstance()), new \App\Dice());
$app->play();

$v1ExecuteTime = microtime(true) - $v1StartTime;

//V2
$v2StartTime = microtime(true);
$player = new \AppV2\Player\SnakesLaddersPlayer();

$messenger = new \AppV2\Messenger\ConsoleMessenger();


$game = new AppV2\Game\SnakesLadders($player, $messenger, new AppV2\PlayingThings\Dice\NormalDice(),
    new \AppV2\Messenger\Message\StringMessage());

$game->play();
$v2ExecuteTime = microtime(true) - $v2StartTime;

echo "Execute v1 time" . (string)$v1ExecuteTime . PHP_EOL;
echo "Execute v2 time" . (string)$v2ExecuteTime . PHP_EOL;