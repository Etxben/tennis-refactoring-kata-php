<?php

require_once __DIR__ . '/vendor/autoload.php';
use Feature\TennisGame1;

$tennisGame = new TennisGame1('player1', 'player2');

$tennisGame->wonPoint('player1');
$tennisGame->wonPoint('player1');

var_dump($tennisGame->getScore());