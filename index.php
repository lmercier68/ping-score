<?php

require "./vendor/autoload.php";

use Acs\PingScore\class\Game;
use Acs\PingScore\class\Player;
$player1 = new Player("paul");
$player2 = new Player("pierre");
$game =new Game($player1, $player2, 3);
while(!$game->getGameOver()){
    randSet($game, $player1, $player2);
}



  function randSet(Game $game,Player $player1, Player $player2){

       $hazard = mt_rand(0,1);
       if($hazard){
           $game->incrementScorePlayer($player1);
       }
       else {
           $game->incrementScorePlayer($player2);       
        }
 }