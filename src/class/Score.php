<?php
namespace Acs\PingScore\class;


class Score{

    private  array $score;
    protected array $players;
    protected array $scores;


    public function  __construct(Player $player1,Player $player2){
        $this->score[$player1->getUID()] = 0;
        $this->score[$player2->getUID()] = 0;
        $this->players[] = $player1;
        $this->players[] = $player2;
    }

    public function getPlayerScore(Player $player) : mixed
    { 
        return $this->score[$player];
    }

    public function incrementScorePlayer(Player $player)
    {
        $this->score[$player->getUID()] +=1;
        echo ('point marqué :' . $this->score[$this->players[0]->GetUID()]." - ".$this->score[$this->players[1]->GetUID()]."<br>");
        $this->scores[] = $this->score[$this->players[0]->GetUID()]." - ".$this->score[$this->players[1]->GetUID()];
    }

    public function getScoresHistory() : array
    {
        return $this->scores;
    }
    public function getScores(){
        return $this->score;
    }
}