<?php
namespace Acs\PingScore\class;


class Score{

    private  array $score;


    public function  __construct(Player $player1,Player $player2){
        $this->score[$player1->getUID()] = 0;
        $this->score[$player2->getUID()] = 0;
    }

    public function getPlayerScore(Player $player){
        return $this->score[$player];
    }

    public function incrementScorePlayer(Player $player)
    {
        $this->score[$player->getUID()] +=1;
    }

    public function resetScore()
    {
        $this->score =  array();
    }
    
    public function getScores(){
        return $this->score;
    }
}