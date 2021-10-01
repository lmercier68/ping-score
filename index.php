<!doctype html>
 <html lang="fr">
 <head>
   <meta charset="utf-8">
   <title>Titre de la page</title>
   <link rel="stylesheet" href="./public/assets/css/ping_score.css">
   <link rel="stylesheet" href="./public/assets/css/bootstrap.css">
   <link rel="stylesheet" href="./public/assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" 
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
   <script src="script.js"></script>
 </head>
 <body>
   
     <div class="row justify-content-center">
        <div class="row ">
            <div class="card pe-2 ps-2 text-center">-= PING-SCORE =-</div>
        </div>
        <hr>
        <div class="row col-8  ">
            <div class="col-2 "></div>
            <div class="d-inline-flex flex-row  col-8 card d-flex">
               <div id="player1_name" class=" col-4 text-center "><i class="fas fa-user"> joueur 1</i></div>
               <div id="vs_label" class="col-4 text-center"> vs </div>
               <div id="player2_name" class=" col-4 text-center "><i class="fas fa-user"> joueur 2</i></div>
            </div>
            <div class="col-2 "></div>
        </div>
        <hr>
        <div class="row col-8 text-center" style="height:200px;">
        <div class="col-2 text-center ">
                <div style="height:40%"></div>
                <div >
                    <button id="btn_player1_point" class="btn-warning btn-lg shadow">
                        <i class='fas fa-table-tennis'></i>
                    </button>
                </div>
                <div style="height:40%"></div>
            </div>

            <div id="container_player1_score" class="d-inline-flex flex-row col-3 card d-flex shadow justify-content-center pt-4 " >
               <div id="player1_score" class=" col-5 text-center display-1"><strong>0</strong></div>
            </div>

            <div id="container_set_info" class="col-2 text-center">
                <div class="col-12 h-10 mt-1"><strong>Set actuel</strong></div>
                <div id="set_actual" class="col-12 h-20 display-6" ><strong>1</strong></div>
                <hr class=" mt-1 mb-0">
                <div class="col-12 h-20">Set score</div>
                <div id="set_score" class="col-12 h-20 display-6"><strong>0 - 0</strong></div>
            </div>

            <div id="container_player2_score" class="d-inline-flex flex-row col-3 card d-flex shadow justify-content-center pt-4" >
               <div id="player2_score" class=" col-5 text-center display-1"><strong> 0</strong></div>
         
            </div>
            <div class=" col-2 text-center ">
                <div style="height:40%"></div>
                <div>
                    <button id="btn_player2_point" class="btn-warning btn-lg shadow">
                <i class='fas fa-table-tennis'></i>
                </button></div>
                <div style="height:40%"></div>
            </div>
        </div>

    </div>

 </body>
 </html>

<?php
session_start();

require "./vendor/autoload.php";


use Acs\PingScore\class\Game;
use Acs\PingScore\class\Player;

$player1 = new Player("paul");
$player2 = new Player("pierre");
$game =new Game($player1, $player2, 3);

while(!$game->isGameOver()){
    randSet($game, $player1, $player2);
}

function randSet(Game $game,Player $player1, Player $player2){
       $hazard = mt_rand(0,1);
       if($hazard){
           $game->getGameSet()->incrementScorePlayer($player1);
           $game->checkEndGame($player1);
       }
       else {
           $game->getGameSet()->incrementScorePlayer($player2);
           $game->checkEndGame($player2);       
        }
 }
 ?>
