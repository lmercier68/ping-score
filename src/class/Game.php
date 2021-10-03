<?php
namespace Acs\PingScore\class;
 
class Game{
    
    protected int $nombreSet = 0;
    protected int $actualSet = 0;
    protected array $players;
    protected array $gameSets =[];
    protected bool $gameOver = false;
    protected GameSet $gameSet;

    public function __construct(Player $player1, Player $player2, int $nb_set)
    {
        $this->players[] = $player1;
        $this->players[] = $player2;
        $this->nombreSet = $nb_set;   
       
    } 
    public function startSet(){
        $this->actualSet += 1;
        $this->gameSet = New GameSet($this, $this->players[0], $this->players[1], $this->actualSet);
        echo 'actualSet -1:';
        dump($this->actualSet);
    }
    public function checkEndGame(Player $player)
    {
        if($this->gameSet->isFinish()){
            $this->gameSets[]=$this->gameSet; 
            
            if($player->getWonSet() >= $this->nombreSet){
                echo 'Le joueur ' . $player->getName(). " remporte le match";
                $this->gameOver =true;
                return true;
            }else{
                echo 'actualSet -2:';
                dump($this->actualSet);
                $this->startSet();
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
    public function getActualSet(){
        return $this->actualSet;
    }
    /**
     * endRegion getter/setter
     * 
     */

}