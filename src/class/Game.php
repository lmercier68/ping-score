<?php
namespace Acs\PingScore\class;
 
class Game{
    
    protected int $nombreSet = 0;
    protected int $actualSet =0;
    protected array $players;
    protected array $gameSets =[];
    protected bool $gameOver = false;
    protected GameSet $gameSet;

    public function __construct(Player $player1, Player $player2, int $nb_set)
    {
        $this->players[] = $player1;
        $this->players[] = $player2;
        $this->nombreSet = $nb_set;   
        $this->gameSet = New GameSet($this, $player1, $player2, $this->actualSet);

    } 

    public function checkEndGame(Player $player)
    {
        if($this->gameSet->isFinish()){
            $this->gameSets[]=$this->gameSet; 
            $this->actualSet +=1;
            $this->gameSet = New GameSet($this, $this->players[0], $this->players[1], $this->actualSet);

            if($player->getWonSet() >= $this->nombreSet){
                echo 'Le joueur ' . $player->getName(). " remporte le match";
                $this->gameOver =true;
                return true;
            }
        }
        return false;
    }

    /**
     * Region :getter/setter
     *
     */
    public function getGameSet(){
        return $this->gameSet;
    }
    public function isGameOver(){
        return $this->gameOver;
    }
    /**
     * endRegion getter/setter
     * 
     */

}