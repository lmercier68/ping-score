<?php
namespace Acs\PingScore\class;

use Acs\PingScore\class\Game;
use Acs\PingScore\class\Score;
use Acs\PingScore\class\Player;

class GameSet
{
    protected int $gameSetNumber = 0;
    protected Game $game;
    protected array $players;
    protected array $setWon;
    protected Score $score;

    public function __construct( 
        Player $player1,
        Player $player2,
        int $setNumber, 
    ){
        $this->players[] = $player1;
        $this->players[] = $player2;
        $this->gameSetNumber = $setNumber;
        $this->score = new Score($this->players[0], $this->players[1]);
    }  

    public function checkSetWinner(Player $player) : bool
    {
        $scores =$this->score->getScores();

        if($scores[$player->GetUID()] >= 11 )
        {
            if($this->checkDifference($player->GetUID())){
                $this->setWon[] = $player->GetUID();
                echo ('set terminé avec les scores suivante: ' . $scores[$this->players[0]->GetUID()]." - ".$scores[$this->players[1]->GetUID()]."<br>");
            
                return true;
            }
            return false;
        }
        return false;
     
    }
     /**
     * Vérifie si l'écart de point entre player1 et player2 est supérieur ou égale à 2
     *
     * @return boolean -true si la différence de point est supérieure ou égale à 2
     */
    public function checkDifference() : bool
    {
        if(abs( $this->score->getScores()[$this->players[0]->getUID()] - $this->score->getScores()[$this->players[1]->getUID()]) >= 2){
           return true;
        }
        return false;
    }
    public function getScore(){
        return $this->score;
    }

}