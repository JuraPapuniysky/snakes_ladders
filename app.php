<?php

require __DIR__.'/vendor/autoload.php';

$app = \App\App::getInstance(\App\Player::getInstance());
$app->play();
