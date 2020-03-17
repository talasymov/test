<?php
require_once "Player.php";
require_once "Game.php";

use Game\Game;
use Game\Player;


$playerBob = new Player("Bob", 1);
$playerJohn = new Player("John");

$game = new Game($playerBob, $playerJohn);

for ($i = 0; $i < 100; $i++) {
    echo $game->battle();
}
