<?php
namespace Acs\PingScore\class;

use dump;
use Acs\PingScore\class\Game;
use Acs\PingScore\class\Score;
use Acs\PingScore\class\Player;

class GameSet
{
    const MIN_POINT_TO_WIN_SET = 11;
    const DIFFERENCE_TO_WIN = 2;

    protected int $gameSetNumber = 0;
    protected Game $game;
    protected array $players;
    protected array $setWon;
    protected Score $score;
    protected bool $isFinish = false;

    public function __construct( 
        Game $game,
        Player $player1,
        Player $player2,
        int $setNumber, 
    ){
        $this->game = $game;
        $this->players[] = $player1;
        $this->players[] = $player2;
        $this->gameSetNumber = $setNumber;
        $this->score = new Score($this->players[0], $this->players[1]);
    }  

    public function checkSetWinner(Player $player) : bool
    {
        $scores =$this->score->getScores();
        if($scores[$player->GetUID()] >=     self::MIN_POINT_TO_WIN_SET )
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

    public function checkDifference() : bool
    {
        $difference8score = abs( 
            $this->score->getScores()[$this->players[0]->getUID()]
             -
             $this->score->getScores()[$this->players[1]->getUID()]
            );
        if($difference8score >= self::DIFFERENCE_TO_WIN){
           return true;
        }
        return false;
    }

    public function getScore(){
        return $this->score;
    }

    public function incrementScorePlayer(Player $player)
    {
        $this->score->incrementScorePlayer($player);
        if($this->checkSetWinner($player)){  
            $this->isFinish = true;
            $player->addWonSet();
        }
    }
    public function isFinish()
    {
        return $this->isFinish;
    }

}